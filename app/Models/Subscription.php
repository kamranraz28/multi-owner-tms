<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_id',
        'plan_id',
        'status',
        'price',
        'billing_cycle',
        'starts_at',
        'trial_ends_at',
        'ends_at',
        'cancelled_at',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'trial_ends_at' => 'datetime',
        'ends_at' => 'datetime',
        'cancelled_at' => 'datetime',
        'price' => 'decimal:2',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function histories()
    {
        return $this->hasMany(SubscriptionHistory::class);
    }

    public function isActive()
    {
        return $this->status === 'active';
    }

    public function isTrialing()
    {
        return $this->status === 'trialing' && $this->trial_ends_at && now()->lt($this->trial_ends_at);
    }

    public function isExpired()
    {
        return $this->status === 'expired' || ($this->ends_at && now()->gt($this->ends_at));
    }

    public function isCancelled()
    {
        return $this->status === 'cancelled';
    }
}
