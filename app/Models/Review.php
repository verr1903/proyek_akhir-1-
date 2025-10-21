<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_users',
        'id_product',
        'komentar',
        'bintang',
    ];

    /**
     * Relasi ke model User
     * Setiap review dibuat oleh satu user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    /**
     * Relasi ke model Product
     * Setiap review terkait dengan satu produk
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
