<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discounts';

    protected $fillable = [
        'id_product',
        'persentase',
        'start_at',
        'end_at',
        'status',
    ];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at'   => 'datetime',
    ];

    /**
     * Relasi ke Product
     */
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'id_product');
    }

    /**
     * Scope diskon aktif
     */
    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif')
                     ->where('start_at', '<=', now())
                     ->where('end_at', '>=', now());
    }

    /**
     * Cek apakah diskon sudah berakhir
     */
    public function isExpired()
    {
        return now()->greaterThan($this->end_at);
    }

    /**
     * (Opsional) cek apakah diskon sedang aktif
     */
    public function isActive()
    {
        return $this->status === 'aktif'
            && now()->between($this->start_at, $this->end_at);
    }
}
