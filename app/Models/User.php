<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Attributes yang bisa diisi massal
     */
    protected $fillable = [
        'name',
        'email',
        'no_telepon',
        'password',
        'role',
        'profile_photo_path',
    ];

    /**
     * Attributes yang disembunyikan
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Cast attributes
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Accessor untuk mendapatkan URL foto profil
     */
    public function getProfilePhotoUrlAttribute()
    {
        return $this->profile_photo_path
            ? asset('storage/' . $this->profile_photo_path)
            : asset('images/default-profile.png'); // path default jika belum ada foto
    }

    // Relasi ke Order (pesanan)
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
