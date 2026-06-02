<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Plan::insert([
            [
                'name' => 'Basic',
                'slug' => 'basic',
                'price' => 999,
                'billing_cycle' => 'monthly',
                'subscriptions' => 'basic',
                'max_properties' => 5,
                'max_tenants' => 20,
                'max_users' => 3,
                'features' => json_encode([]),
                'trial_days' => 7,
                'is_active' => 1,
            ],
            [
                'name' => 'Silver',
                'slug' => 'silver',
                'price' => 2499,
                'billing_cycle' => 'monthly',
                'subscriptions' => 'silver',
                'max_properties' => 25,
                'max_tenants' => 100,
                'max_users' => 10,
                'features' => json_encode([]),
                'trial_days' => 14,
                'is_active' => 1,
            ],
            [
                'name' => 'Gold',
                'slug' => 'gold',
                'price' => 6999,
                'billing_cycle' => 'monthly',
                'subscriptions' => 'gold',
                'max_properties' => 999999,
                'max_tenants' => 999999,
                'max_users' => 999999,
                'features' => json_encode([]),
                'trial_days' => 30,
                'is_active' => 1,
            ],
        ]);
    }
}
