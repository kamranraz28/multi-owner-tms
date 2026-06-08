<?php

namespace App\Http\Middleware;

use App\Services\SubscriptionService;
use Closure;

class CheckPlanLimit
{
    public function handle($request, Closure $next, $resource = null)
    {
        $user = auth()->user();
        $org = $user->organization;

        if ($user->hasRole('Admin')) {
            return $next($request);
        }

        if (!$org || !$org->plan) {
            return redirect()->route('plans')->with('error', 'Please select a plan first.');
        }

        $sub = $org->activeSubscription;

        if (!$sub) {
            return redirect()->route('users.dashboard')->with('error', 'Your subscription has expired.');
        }

        if (!$sub->isActive() && !$sub->isTrialing()) {
            return redirect()->route('users.dashboard')->with('error', 'Your subscription has expired.');
        }

        if ($resource) {
            if (!app(SubscriptionService::class)->checkLimit($org, $resource)) {
                return redirect()->back()->with('error', "You've reached the {$resource} limit for your {$org->plan->name} plan. Upgrade to continue.");
            }
        }

        return $next($request);
    }
}
