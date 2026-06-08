<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        Produk::create([
            'nama_produk' => 'Facial Wash',
            'harga_produk' => 50000,
            'stok' => 10,
            'kategori_id' => 1
        ]);

        Produk::create([
            'nama_produk' => 'Serum Glow',
            'harga_produk' => 120000,
            'stok' => 8,
            'kategori_id' => 1
        ]);

        Produk::create([
            'nama_produk' => 'Toner Bright',
            'harga_produk' => 75000,
            'stok' => 15,
            'kategori_id' => 2
        ]);

        Produk::create([
            'nama_produk' => 'Moisturizer',
            'harga_produk' => 90000,
            'stok' => 12,
            'kategori_id' => 2
        ]);

        Produk::create([
            'nama_produk' => 'Sunscreen',
            'harga_produk' => 65000,
            'stok' => 20,
            'kategori_id' => 3
        ]);
    }
}