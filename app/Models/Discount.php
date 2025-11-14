<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_product',
        'persentase',
        'durasi',
    ];

    protected $appends = ['end_date'];

    /**
     * Relasi ke model Product
     * Setiap discount milik satu produk
     */
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'id_product');
    }

    public function getEndDateAttribute()
    {
        // Misalnya durasi dalam hari dan promo dimulai saat dibuat
        return $this->created_at
            ? Carbon::parse($this->created_at)->addDays($this->durasi)->toDateString()
            : null;
    }

    public function isExpired()
    {
        return now()->greaterThan($this->created_at->addHours($this->durasi));
    }
}
