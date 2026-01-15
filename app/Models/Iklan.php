<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iklan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'sub_judul',
        'gambar',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
