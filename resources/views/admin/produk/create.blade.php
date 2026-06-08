@extends('layouts.master')

@section('content')

<div class="card">

    <h1>Tambah Produk</h1>

    <form
        method="POST"
        action="/admin/produk"
        enctype="multipart/form-data"
    >
        @csrf

        <label>Nama Produk</label>

        <input
            type="text"
            name="nama_produk"
            placeholder="Nama produk"
        >

        <br><br>

        <label>Harga Produk</label>

        <input
            type="number"
            name="harga_produk"
            placeholder="Harga"
        >

        <br><br>

        <label>Stok Produk</label>

        <input
            type="number"
            name="stok"
            placeholder="Stok"
        >

        <br><br>

        <label>Kategori</label>

        <select name="kategori_id">

            @foreach($kategori as $k)

                <option value="{{ $k->id }}">
                    {{ $k->nama_kategori }}
                </option>

            @endforeach

        </select>

        <br><br>

        <label>Foto Produk</label>

        <input
            type="file"
            name="foto"
        >

        <br><br>

        <button type="submit">
            Simpan
        </button>

    </form>

</div>

@endsection