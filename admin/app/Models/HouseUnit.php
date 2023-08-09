<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseUnit extends Model
{
    protected $table = 'house_units';
    protected $fillable = [
        'property_id',
        'property_floor',
        'house_number_on_property',
        'house_rent_price',
        'garbage_fees',
        'status',
    ];

    public function property(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class, 'house_unit_id');
    }

    public function occupancies(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(HouseUnitOccupancy::class, 'house_unit_id');
    }

    public function payments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Payment::class, 'house_unit_id');
    }
}
