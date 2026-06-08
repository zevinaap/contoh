@extends('layouts.master')

@section('content')

<h1>Dashboard POS</h1>

<div class="flex">

    <div class="card" style="width:33%;">
        <h3>Total Produk</h3>

        <h1>{{ $totalProduk }}</h1>
    </div>

    <div class="card" style="width:33%;">
        <h3>Total Transaksi</h3>

        <h1>{{ $totalTransaksi }}</h1>
    </div>

    <div class="card" style="width:33%;">
        <h3>Total Pendapatan</h3>

        <h1>
            Rp {{ number_format($totalPendapatan) }}
        </h1>
    </div>

</div>

<div class="card">

    <h3>Transaksi Terbaru</h3>

    <table>

        <tr>
            <th>ID</th>
            <th>Total</th>
            <th>Uang</th>
            <th>Kembalian</th>
        </tr>

        @foreach($transaksiTerbaru as $t)

        <tr>
            <td>{{ $t->id }}</td>

            <td>
                Rp {{ number_format($t->total_harga) }}
            </td>

            <td>
                Rp {{ number_format($t->uang_pelanggan) }}
            </td>

            <td>
                Rp {{ number_format($t->kembalian) }}
            </td>
        </tr>

        @endforeach

    </table>

</div>

@endsection