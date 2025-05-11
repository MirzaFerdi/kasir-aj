<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'nama_produk',
        'stok',
        'harga',
    ];

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
    public function thumbnail()
    {
        return $this->hasMany(ProdukThumbnail::class);
    }
}
