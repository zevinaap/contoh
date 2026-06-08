<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;
use App\Models\Produk;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Kategori::insert([
            ['nama_kategori'=>'Facial Wash','keterangan'=>'Pembersih wajah'],
            ['nama_kategori'=>'Serum','keterangan'=>'Perawatan kulit'],
            ['nama_kategori'=>'Moisturizer','keterangan'=>'Pelembab'],
        ]);

        Produk::insert([
            ['nama_produk'=>'Cleanser A','harga_produk'=>50000,'kategori_id'=>1],
            ['nama_produk'=>'Cleanser B','harga_produk'=>60000,'kategori_id'=>1],
            ['nama_produk'=>'Serum Glow','harga_produk'=>120000,'kategori_id'=>2],
            ['nama_produk'=>'Moisturizer Soft','harga_produk'=>90000,'kategori_id'=>3],
            ['nama_produk'=>'Moisturizer Hydra','harga_produk'=>110000,'kategori_id'=>3],
        ]);
    }
}