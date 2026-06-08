<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::insert([
    ['nama_kategori'=>'Facial Wash','keterangan'=>'Pembersih wajah'],
    ['nama_kategori'=>'Serum','keterangan'=>'Perawatan kulit'],
    ['nama_kategori'=>'Moisturizer','keterangan'=>'Pelembab'],
]);
    }
}
