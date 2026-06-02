<?php

namespace App\Http\Middleware;

use App\Services\SubscriptionService;
use Closure;

class CheckPlanLimit
{
    public function handle($request, Closure $next, $resource)
    {
        $user = auth()->user();
        $org = $user->organization;

        if (!$org || !$org->plan) {
            return redirect()->route('plans')->with('error', 'Please select a plan first.');
        }

        if ($org->activeSubscription && !$org->activeSubscription->isActive() && !$org->activeSubscription->isTrialing()) {
            return redirect()->route('plans')->with('error', 'Your subscription has expired.');
        }

        if (!app(SubscriptionService::class)->checkLimit($org, $resource)) {
            return redirect()->back()->with('error', "You've reached the {$resource} limit for your {$org->plan->name} plan. Upgrade to continue.");
        }

        return $next($request);
    }
}
