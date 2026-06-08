<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class Organization extends Model
{
    use HasFactory,HasRoles;
    protected $guard_name = 'web';
    protected $fillable = [
        'name',
        'slug',
        'email',
        'phone',
        'password',
        'role_id',
        'user_id',
        'logo',
        'plan_id',
        'trial_ends_at',
    ];

    /**
     * The attributes that should be hidden.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'trial_ends_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function activeSubscription()
    {
        return $this->hasOne(Subscription::class)->whereIn('status', ['trialing', 'active']);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function organizationUsers()
    {
        return $this->hasMany(OrganizationUser::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    public function expiredSubscription()
    {
        return $this->hasOne(Subscription::class)->where('status','expired');
    }

    public function cancelledSubscription()
    {
        return $this->hasOne(Subscription::class)->where('status','cancelled');
    }


}
