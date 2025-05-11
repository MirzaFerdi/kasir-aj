<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukThumbnail extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'produk_id',
        'url',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
