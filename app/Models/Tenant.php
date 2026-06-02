<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'nid_number',
        'nid_upload',
        'property_id',
        'status',
        'invoicing',
<<<<<<< HEAD
=======
        'organization_id',
>>>>>>> c57bb21 (subscription module)
        'invoice_month',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function tenantServices()
    {
        return $this->hasMany(Tenantservice::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}
