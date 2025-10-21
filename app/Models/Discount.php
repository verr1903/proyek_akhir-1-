<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_product',
        'persentase',
        'durasi',
    ];

    /**
     * Relasi ke model Product
     * Setiap discount milik satu produk
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

}
