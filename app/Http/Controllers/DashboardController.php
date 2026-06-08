<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduk = Produk::count();

        $totalTransaksi = Transaksi::count();

        $totalPendapatan = Transaksi::sum('total_harga');

        $transaksiTerbaru = Transaksi::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalProduk',
            'totalTransaksi',
            'totalPendapatan',
            'transaksiTerbaru'
        ));
    }
}