<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Kolom yang dapat diisi (mass assignable).
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'avatar',
        'role',
        'google_id',
    ];

    /**
     * Kolom yang disembunyikan saat model dikonversi ke array atau JSON.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Konversi tipe kolom tertentu secara otomatis.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Accessor untuk mendapatkan URL avatar (jika ada).
     */
    public function getAvatarUrlAttribute()
    {
        if ($this->avatar) {
            // Jika avatar sudah berupa URL langsung
            if (filter_var($this->avatar, FILTER_VALIDATE_URL)) {
                return $this->avatar;
            }
            // Jika avatar disimpan dalam folder storage
            return asset('storage/' . $this->avatar);
        }

        // Default avatar (misalnya gambar placeholder)
        return asset('images/default-avatar.png');
    }
}
