<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'produk_id',
        'transaksi_id',
        'jumlah_produk',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
