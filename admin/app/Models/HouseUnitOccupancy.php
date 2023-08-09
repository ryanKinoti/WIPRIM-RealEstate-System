<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseUnitOccupancy extends Model
{
    protected $table = 'house_unit_occupancies';
    protected $fillable = [
        'house_unit_id',
        'user_id',
        'date_of_occupancy',
        'date_of_vacancy',
    ];

    public function houseUnit(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(HouseUnit::class, 'house_unit_id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
