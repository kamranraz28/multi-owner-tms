<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'status',
        'organization_id',
    ];
    public function costDetails()
    {
        return $this->hasMany(Costdetail::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

}
