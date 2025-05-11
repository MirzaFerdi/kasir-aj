<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produk::create([
            'nama_produk' => 'Produk 1',
            'stok' => 10,
            'harga' => 10000,
        ]);
        Produk::create([
            'nama_produk' => 'Produk 2',
            'stok' => 20,
            'harga' => 20000,
        ]);
        Produk::create([
            'nama_produk' => 'Produk 3',
            'stok' => 30,
            'harga' => 30000,
        ]);
    }
}
