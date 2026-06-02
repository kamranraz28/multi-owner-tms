<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\SubscriptionHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function showRegistrationForm(Request $request)
    {
        $planId = $request->query('plan');
        $selectedPlan = $planId ? Plan::find($planId) : null;

//        dd($selectedPlan);
        return view('auth.register', compact('selectedPlan'));
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'org_name' => 'required|string|max:255',
            'plan_id' => 'nullable|exists:plans,id',
        ]);

        $user = null;
        $org = null;

        DB::transaction(function () use ($validated, &$user, &$org) {
            $org = Organization::create([
                'name' => $validated['org_name'],
                'slug' => Str::slug($validated['org_name']) . '-' . uniqid(),
                'email' => $validated['email'],
                'trial_ends_at' => now()->addDays(14),
            ]);

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'organization_id' => $org->id,
            ]);
            $user->assignRole('organization');

            $org->update(['user_id' => $user->id]);

            if (!empty($validated['plan_id'])) {
                $plan = Plan::findOrFail($validated['plan_id']);
                $this->createSubscription($org, $plan);
            }
        });

        Auth::login($user);

        if (!empty($validated['plan_id'])) {
            return redirect()->route('users.dashboard')->with('success', 'Registration complete! Welcome aboard.');
        }

        return redirect()->route('plans')->with('info', 'Please select a plan to get started.');
    }

    public function showPlanForm()
    {
        $plans = Plan::where('is_active', true)->get();
        return view('auth.choose-plan', compact('plans'));
    }

    private function createSubscription(Organization $org, Plan $plan)
    {
        $trialDays = $plan->trial_days;

        $subscription = Subscription::create([
            'organization_id' => $org->id,
            'plan_id' => $plan->id,
            'status' => $trialDays > 0 ? 'trialing' : 'active',
            'price' => $plan->price,
            'billing_cycle' => $plan->billing_cycle ?? 'monthly',
            'starts_at' => now(),
            'trial_ends_at' => $trialDays > 0 ? now()->addDays($trialDays) : null,
        ]);

        $org->update([
            'plan_id' => $plan->id,
            'trial_ends_at' => $subscription->trial_ends_at,
        ]);

        SubscriptionHistory::create([
            'subscription_id' => $subscription->id,
            'event' => 'created',
            'metadata' => json_encode([
                'plan' => $plan->name,
                'price' => $plan->price,
                'trial_days' => $trialDays,
            ]),
        ]);
    }
}
