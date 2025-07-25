<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar_path', // ✅ avatar için ekledik
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relation: User has many favorites
     */
    public function favorites()
    {
        return $this->hasMany(\App\Models\Favorite::class);
    }

    /**
     * Accessor: get full URL of user's avatar
     */
    // app/Models/User.php
    public function bookings()
    {
        return $this->hasMany(\App\Models\Booking::class);
    }

    public function getAvatarUrlAttribute()
    {
        return $this->avatar_path
            ? asset('storage/' . $this->avatar_path)
            : 'https://via.placeholder.com/100';
    }
}
