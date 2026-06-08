<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model {
    protected $fillable=['total_harga','uang_pelanggan','kembalian'];

    public function detail(){
        return $this->hasMany(DetailTransaksi::class);
    }
}