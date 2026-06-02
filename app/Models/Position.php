<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
<<<<<<< HEAD
=======
        'organization_id',
>>>>>>> c57bb21 (subscription module)
        'status',
    ];

    public function property()
    {
        return $this->hasOne(Property::class);
    }
}
