<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\SubscriptionHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function subscribe(Request $request, Plan $plan)
    {
        $user = auth()->user();
        $org = $user->organization;

        if (!$org) {
            return redirect()->route('plans')->with('error', 'No organization found. Please complete registration first.');
        }

        if ($org->activeSubscription) {
            return redirect()->back()->with('error', 'Already have an active subscription.');
        }

        DB::transaction(function () use ($org, $plan) {
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
                'metadata' => json_encode(['plan' => $plan->name, 'trial_days' => $trialDays]),
            ]);
        });

        return redirect()->route('users.dashboard')->with('success', "Subscribed to {$plan->name} plan!");
    }

    public function index()
    {
        $plans = Plan::where('is_active', 1)->get();
        return view('website.plans.index', compact('plans'));
    }
}
