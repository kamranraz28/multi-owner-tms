<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'organization_id',
    ];

    public function tenantServices()
    {
        return $this->hasMany(Tenantservice::class);
    }
    public function costDetails()
    {
        return $this->hasMany(Costdetail::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

}
