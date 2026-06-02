<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'price',
        'billing_cycle',
        'subscriptions',
        'max_properties',
        'max_tenants',
        'max_users',
        'features',
        'trial_days',
        'asset_liabilities',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean',
    ];

    public function organizations() { return $this->hasMany(Organization::class); }
    public function subscriptions() { return $this->hasMany(Subscription::class); }

}
