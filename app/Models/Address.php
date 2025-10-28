<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_users',
        'nama_penerima',
        'kecamatan',
        'kelurahan',
        'nomor_hp',
        'jalan',
        'status',
    ];

    /**
     * Relasi ke model User
     * Setiap alamat dimiliki oleh satu user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}
