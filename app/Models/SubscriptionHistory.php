<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscription_id',
        'event',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'json',
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
