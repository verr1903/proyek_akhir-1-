<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_users',
        'id_address',
        'no_pesanan',
        'total_harga',
        'status',
        'action_by',
        'action_by_2',
        'tempat_pesanan',
        'metode_pembayaran',
        'bukti_pengiriman',
    ];

    /**
     * Relasi ke model User
     * Setiap order dimiliki oleh satu user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    /**
     * Relasi ke model Product
     * Setiap order berisi satu produk
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    /**
     * Relasi ke model Address
     * Menyimpan alamat pengiriman
     */
    public function address()
    {
        return $this->belongsTo(Address::class, 'id_address');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
