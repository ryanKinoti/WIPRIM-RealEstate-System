<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties';
    protected $fillable = [
        'property_identifier',
        'property_name',
        'property_location',
        'location',
        'number_of_floors',
        'MPESA_pay_bill',
        'Bank Deposit',
    ];

    public function houseUnits(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(HouseUnit::class, 'property_id');
    }
}
