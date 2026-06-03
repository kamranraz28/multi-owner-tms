<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'organization_id',
    ];

    public function property()
    {
        return $this->hasOne(Property::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

}
