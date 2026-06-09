<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Notification;
use App\Models\Organization;
use App\Models\Property;
use App\Models\Settings;
use App\Models\Subscription;
use App\Models\Tenant;
use App\Models\User;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();

        return view('users.index', ['users' => $users]);
    }

    public function dashboard()
    {
        /*
        |--------------------------------------------------------------------------
        | Section 1: Admin Dashboard Statistics
        |--------------------------------------------------------------------------
        | This section calculates organization statistics for the admin dashboard.
        |
        | Metrics:
        | - Total Organizations
        | - Active Organizations
        | - Paid Organizations (Active subscription covering current month)
        | - Expired Subscription Organizations
        | - Cancelled Subscription Organizations
        | - Unpaid Organizations (Active but no subscription for current month)
        |
        | Note:
        | Both paid and unpaid counts filter by current month using
        | subscription starts_at/ends_at dates.
        |--------------------------------------------------------------------------
        */

        // auth id find and uppercase and lowercase issue fix
        $user = auth()->user();
        $adminId = ($user && in_array(strtolower($user->getRoleNames()->first()), ['admin']))
            ? $user->id
            : null;

        // Total Organization
        $totalOrganizations = Organization::all()->count();

        // Active organization
        $totalActiveOrganizations = Organization::where('status', 1)->count();

        // Paid: Organizations with active subscription covering the current month
        $paidOrganizations = Organization::whereHas('activeSubscription', function ($query) {
            $query->where('starts_at', '<=', now()->endOfMonth())
                  ->where(function ($q) {
                      $q->whereNull('ends_at')
                        ->orWhere('ends_at', '>=', now()->startOfMonth());
                  });
        })->count();

        // Expired subscription - new version code
        $expiredSubscriptions = Organization::has('expiredSubscription')
            ->doesntHave('activeSubscription')
            ->count();

        // Cancelled organizations - new version code
        $cancelledOrganizations  = Organization::has('cancelledSubscription')->count();

        // Unpaid: Active organizations without a subscription covering the current month
        $unpaidOrganization = Organization::where('status', 1)
            ->whereDoesntHave('activeSubscription', function ($query) {
                $query->where('starts_at', '<=', now()->endOfMonth())
                      ->where(function ($q) {
                          $q->whereNull('ends_at')
                            ->orWhere('ends_at', '>=', now()->startOfMonth());
                      });
            })->count();


        // totalPayable  ====================
        // ১. যেসব org এর এই মাসে active subscription আছে → সম্পূর্ণ বাদ
        $activeOrgIds = Subscription::where('status', 'active')
            ->pluck('organization_id')
            ->unique()
            ->toArray();

        // ২. যেসব org এর active নেই কিন্তু আগে subscription ছিল
        //    → প্রতিটির সর্বশেষ non-active subscription এর price নাও
        $nonActiveOrgs = Subscription::whereNotIn('organization_id', $activeOrgIds)
            ->whereIn('status', ['expired', 'trialing', 'cancelled'])
            ->select('organization_id')
            ->distinct()
            ->pluck('organization_id');

        $latestNonActiveTotal = 0;
        $latestNonActiveRows  = [];

        foreach ($nonActiveOrgs as $orgId) {
            $latest = Subscription::where('organization_id', $orgId)
                ->whereIn('status', ['expired', 'trialing', 'cancelled'])
                ->orderBy('created_at', 'desc')
                ->first();

            if ($latest) {
                // শুধু প্রথমবার trialing হলে আলাদা group এ যাবে (নিচে handle হবে)
                // এখানে শুধু expired/cancelled নাও
                if (in_array($latest->status, ['expired', 'cancelled'])) {
                    $latestNonActiveTotal += $latest->price;
                    $latestNonActiveRows[] = $latest;
                }
            }
        }

        // ৩. যারা প্রথমবার trialing (আগে কোনো expired/cancelled/active নেই)
        $firstTimeTrialingOrgs = Subscription::where('status', 'trialing')
            ->whereNotIn('organization_id', $activeOrgIds)
            ->whereNotIn('organization_id', function ($query) {
                $query->select('organization_id')
                    ->from('subscriptions')
                    ->whereIn('status', ['expired', 'cancelled', 'active']);
            })
            ->select('organization_id')
            ->distinct()
            ->pluck('organization_id');

        $firstTimeTrialingTotal = 0;
        $firstTimeTrialingRows  = [];

        foreach ($firstTimeTrialingOrgs as $orgId) {
            $trial = Subscription::where('organization_id', $orgId)
                ->where('status', 'trialing')
                ->orderBy('created_at', 'desc')
                ->first();

            if ($trial) {
                $firstTimeTrialingTotal += $trial->price;
                $firstTimeTrialingRows[] = $trial;
            }
        }
        $totalPayable = $latestNonActiveTotal + $firstTimeTrialingTotal;




        // total payable current month
        // =========================================
        // Total Payable Current Month
        // =========================================

        $currentMonth = Carbon::now()->month;
        $currentYear  = Carbon::now()->year;

        // ১. Current month এ active subscription আছে এমন org
        $currentMonthActiveOrgIds = Subscription::where('status', 'active')
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->pluck('organization_id')
            ->unique()
            ->toArray();

        // ২. Active নেই কিন্তু current month এ expired/trialing/cancelled আছে
        $currentMonthNonActiveOrgs = Subscription::whereNotIn('organization_id', $currentMonthActiveOrgIds)
            ->whereIn('status', ['expired', 'trialing', 'cancelled'])
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->select('organization_id')
            ->distinct()
            ->pluck('organization_id');

        $currentMonthLatestNonActiveTotal = 0;
        $currentMonthLatestNonActiveRows  = [];

        foreach ($currentMonthNonActiveOrgs as $orgId) {

            $currentMonthLatest = Subscription::where('organization_id', $orgId)
                ->whereIn('status', ['expired', 'trialing', 'cancelled'])
                ->whereMonth('created_at', $currentMonth)
                ->whereYear('created_at', $currentYear)
                ->latest()
                ->first();

            if ($currentMonthLatest) {

                if (in_array($currentMonthLatest->status, ['expired', 'cancelled'])) {

                    $currentMonthLatestNonActiveTotal += $currentMonthLatest->price;

                    $currentMonthLatestNonActiveRows[] = $currentMonthLatest;
                }
            }
        }

        // ৩. First Time Trialing (Current Month)
        $currentMonthFirstTimeTrialingOrgs = Subscription::where('status', 'trialing')
            ->whereNotIn('organization_id', $currentMonthActiveOrgIds)
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->whereNotIn('organization_id', function ($query) {
                $query->select('organization_id')
                    ->from('subscriptions')
                    ->whereIn('status', ['expired', 'cancelled', 'active']);
            })
            ->select('organization_id')
            ->distinct()
            ->pluck('organization_id');

        $currentMonthFirstTimeTrialingTotal = 0;
        $currentMonthFirstTimeTrialingRows  = [];

        foreach ($currentMonthFirstTimeTrialingOrgs as $orgId) {

            $currentMonthTrial = Subscription::where('organization_id', $orgId)
                ->where('status', 'trialing')
                ->whereMonth('created_at', $currentMonth)
                ->whereYear('created_at', $currentYear)
                ->latest()
                ->first();

            if ($currentMonthTrial) {

                $currentMonthFirstTimeTrialingTotal += $currentMonthTrial->price;

                $currentMonthFirstTimeTrialingRows[] = $currentMonthTrial;
            }
        }

        // Final Current Month Total Payable
        $currentMonthTotalPayable =
            $currentMonthLatestNonActiveTotal +
            $currentMonthFirstTimeTrialingTotal;
//        dd($currentMonthTotalPayable);

        /*
        |--------------------------------------------------------------------------
        | Section 2: Organization / Owner
        |--------------------------------------------------------------------------
        | This function generates organization-level dashboard statistics for the
        | owner, including tenant status, payment tracking, and financial summaries
        | for the current month.
        |
        */

        // Get authenticated user's organization ID
        $orgId = auth()->user()->organization_id;

        // Fetch all active tenants with their related payments and services
        $tenants = Tenant::with(['payments', 'tenantServices'])
            ->where('organization_id', $orgId)
            ->where('status', 1)
            ->get();

        // Total tenants in this organization
        $tenantCount = Tenant::where('organization_id', $orgId)->count();

        // Count of active tenants
        $activeTenants = $tenants->count();

        // Total properties under this organization
        $totalProperties = Property::where('organization_id', $orgId)->count();

        // Current month in YYYY-MM format (e.g., 2026-06)
        $currentMonth = now()->format('Y-m'); // format like '2025-05'

        /**
         * Get IDs of tenants who have made a payment in the current month
         */
        $paidTenantIds = $tenants->filter(function ($tenant) use ($currentMonth) {
            return $tenant->payments->contains('payment_month', $currentMonth);
        })->pluck('id');

        // Number of tenants who paid this month
        $paidTenantsCount = $paidTenantIds->count();

        // Number of tenants who have not paid this month
        $unpaidTenantsCount = $activeTenants - $paidTenantsCount;

        /**
         * Total payable amount:
         * Sum of all service values of active tenants
         */
        $totalPayableValue = $tenants->sum(function ($tenant) {
            return $tenant->tenantServices->sum('value');
        });

        /**
         * Total paid amount:
         * Sum of service values of tenants who have paid this month
         */
        $totalPaidValue = $tenants->filter(function ($tenant) use ($paidTenantIds) {
            return $paidTenantIds->contains($tenant->id);
        })->sum(function ($tenant) {
            return $tenant->tenantServices->sum('value');
        });

        // Remaining amount to be paid
        $totalRemainingValue = $totalPayableValue - $totalPaidValue;

        // Current month in human-readable format (e.g., June 2026)
        $thisMonth = now()->format('F Y'); // Get current month name and year



        // Return data to dashboard view
        return view('dashboard', compact(
            'tenants',
            'tenantCount',
            'activeTenants',
            'totalProperties',
            'paidTenantsCount',
            'unpaidTenantsCount',
            'totalPayableValue',
            'totalPaidValue',
            'totalRemainingValue',
            'thisMonth',
            'totalOrganizations',
            'totalActiveOrganizations',
            'paidOrganizations',
            'expiredSubscriptions',
            'cancelledOrganizations',
            'unpaidOrganization',
            'adminId',
            'totalPayable',
            'currentMonthTotalPayable'
        ));
    }


    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $this->userService->storeUser($request);
        return redirect()->back()->with('success', 'User created and role assigned successfully!');
    }

    public function edit($id)
    {
        $data = $this->userService->editUser($id);
        return view('users.edit', $data);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $this->userService->updateUser($request, $id);
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }


    public function viewProfile()
    {
        // Call the service to get the user's profile
        $data = $this->userService->getUserProfile();
        return view('users.profile', $data); // Pass data to the view
    }


    public function updateProfile(UpdateUserProfileRequest $request)
    {
        $this->userService->updateUserProfile($request);
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function destroy($id)
    {
        $this->userService->deleteUser($id);
        return redirect()->route('users.index')->with('success', 'User Deleted successfully!');
    }

    public function clearAll()
    {
        Notification::query()->update(['notifiable_id' => 1]);

        return redirect()->back()->with('success', 'All notifications have been marked as read.');
    }

    public function logoChangeView()
    {
        return view('users.logoChange');
    }

    public function logoUpdate(Request $request)
    {
        $this->userService->updateSoftLogo($request);
        return redirect()->back()->with('success', 'Application logo has successfully changed.');

    }

    public function colorChangeView()
    {
        return view('users.colorChange');
    }

    public function updateColors(Request $request)
    {
        $request->validate([
            'headerColor' => 'required|string',
            'sidebarColor' => 'required|string',
            'buttonColor' => 'required|string',
        ]);
        // dd($request->all());

        // Save the colors in the settings table
        $settings = Settings::first();
        if (!$settings) {
            $settings = new Settings();
        }

        $settings->header_color = $request->input('headerColor');
        $settings->sidebar_color = $request->input('sidebarColor');
        $settings->button_color = $request->input('buttonColor');
        $settings->save();
        return back()->with('success', 'Colors updated successfully!');
    }

}
