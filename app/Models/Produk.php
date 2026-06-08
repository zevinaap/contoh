<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
    'nama_produk',
    'harga_produk',
    'stok',
    'foto',
    'kategori_id'
];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}