<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\SubscriptionHistory;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function subscribe(Request $request, Plan $plan)
    {
        $user = auth()->user();
        $org = $user->organization;

        if (!$org) {
            return redirect()->route('plans')->with('error', 'No organization found.');
        }

        $activeSub = $org->activeSubscription;

        if ($activeSub) {
            return redirect()->route('payment', $plan);
        }

        $trialEndsAt = now()->addDays($plan->trial_days);

        DB::transaction(function () use ($org, $plan, $trialEndsAt) {
            $org->update([
                'plan_id' => $plan->id,
                'trial_ends_at' => $trialEndsAt,
            ]);

            $subscription = Subscription::create([
                'organization_id' => $org->id,
                'plan_id' => $plan->id,
                'status' => 'trialing',
                'price' => $plan->price,
                'billing_cycle' => $plan->billing_cycle ?? 'monthly',
                'starts_at' => now(),
                'trial_ends_at' => $trialEndsAt,
            ]);

            SubscriptionHistory::create([
                'subscription_id' => $subscription->id,
                'event' => 'created',
                'metadata' => json_encode([
                    'plan' => $plan->name,
                    'type' => 'trial',
                    'trial_days' => $plan->trial_days,
                ]),
            ]);
        });

        return redirect()->route('users.dashboard')->with('success', "Your {$plan->trial_days}-day trial of {$plan->name} plan has started!");
    }

    public function planShowHidden()
    {
        $user = auth()->user();
        $org = $user->organization;
        $existingApproved = Transaction::where('organization_id', $org->id)
            ->where('status','approved')
            ->first();
        return view('sidebar', compact('existingApproved'));
    }

    public function index()
    {
        $plans = Plan::where('is_active', 1)->get();
        $orgPlanId = null;
        $subStatus = null;

        if (auth()->check()) {
            $org = auth()->user()->organization;
            if ($org) {
                $orgPlanId = $org->plan_id;
                $sub = $org->activeSubscription;
                if ($sub) {
                    $subStatus = $sub->status;
                    if ($subStatus === 'trialing' && $sub->trial_ends_at && now()->gt($sub->trial_ends_at)) {
                        $subStatus = 'expired';
                    }
                }
            }
        }

        return view('website.plans.index', compact('plans', 'orgPlanId', 'subStatus'));
    }
}
