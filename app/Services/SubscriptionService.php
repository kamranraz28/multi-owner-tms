<?php

namespace App\Services;

use App\Models\Organization;
use App\Models\Plan;
use App\Models\Property;
use App\Models\Subscription;
use App\Models\SubscriptionHistory;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SubscriptionService
{
    public function checkLimit(Organization $org, string $resource): bool
    {
        $plan = $org->plan;
        if (!$plan) return false;

        $count = $this->getResourceCount($org, $resource);
        $max = $this->getResourceMax($plan, $resource);

        return $count < $max;
    }

    public function getResourceCount(Organization $org, string $resource): int
    {
        return match ($resource) {
            'properties' => Property::where('organization_id', $org->id)->count(),
            'tenants' => Tenant::where('organization_id', $org->id)->count(),
            'users' => User::where('organization_id', $org->id)->count(),
            default => 0,
        };
    }

    public function getResourceMax(Plan $plan, string $resource): int
    {
        return match ($resource) {
            'properties' => $plan->max_properties,
            'tenants' => $plan->max_tenants,
            'users' => $plan->max_users,
            default => 0,
        };
    }

    public function cancelSubscription(Organization $org, ?string $reason = null): void
    {
        $sub = $org->activeSubscription;
        if (!$sub) return;

        $sub->update([
            'status' => 'cancelled',
            'ends_at' => now(),
            'cancelled_at' => now(),
        ]);

        SubscriptionHistory::create([
            'subscription_id' => $sub->id,
            'event' => 'cancelled',
            'metadata' => json_encode(['reason' => $reason ?? 'User requested']),
        ]);
    }

    public function expireTrials(): void
    {
        Subscription::where('status', 'trialing')
            ->where('trial_ends_at', '<', now())
            ->update(['status' => 'expired']);
    }

    public function upgradePlan(Organization $org, Plan $newPlan): ?Subscription
    {
        $oldSub = $org->activeSubscription;

        return DB::transaction(function () use ($org, $newPlan, $oldSub) {
            if ($oldSub) {
                $oldSub->update([
                    'status' => 'cancelled',
                    'ends_at' => now(),
                    'cancelled_at' => now(),
                ]);
            }

            $subscription = Subscription::create([
                'organization_id' => $org->id,
                'plan_id' => $newPlan->id,
                'status' => 'active',
                'price' => $newPlan->price,
                'billing_cycle' => $newPlan->billing_cycle ?? 'monthly',
                'starts_at' => now(),
            ]);

            $org->update(['plan_id' => $newPlan->id]);

            SubscriptionHistory::create([
                'subscription_id' => $subscription->id,
                'event' => 'plan_changed',
                'metadata' => json_encode([
                    'from_plan' => $oldSub?->plan?->name,
                    'to_plan' => $newPlan->name,
                ]),
            ]);

            return $subscription;
        });
    }
}
