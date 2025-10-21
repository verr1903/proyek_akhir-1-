<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kategori',
        'detail',
        'harga',
        'gambar',
        'stok_s',
        'stok_m',
        'stok_l',
        'stok_xl',
    ];


    /**
     * Hitung total stok dari semua ukuran.
     */
    public function getTotalStokAttribute()
    {
        return $this->stok_s + $this->stok_m + $this->stok_l + $this->stok_xl;
    }

    /**
     * Scope untuk filter berdasarkan kategori.
     */
    public function scopeKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }
}
