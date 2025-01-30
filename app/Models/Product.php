<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'satuan',
        'diskon',
        'harga',
        'penyedia',
        'stock',
    ];
}
