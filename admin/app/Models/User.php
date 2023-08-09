<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role',
        'house_unit_id',
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'id_number',
        'address',
        'password',
        'payment_method',
        'email_verified_at',
        'account_status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function houseUnit(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(HouseUnit::class, 'house_unit_id');
    }

    public function passwordResets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PasswordReset::class, 'user_id');
    }

    public function googleUser(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(GoogleUser::class, 'user_id');
    }

    public function occupancies(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(HouseUnitOccupancy::class, 'user_id');
    }

    public function payments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Payment::class, 'user_id');
    }
}
