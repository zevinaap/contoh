```php
@extends('layouts.master')

@section('content')

<div class="card">

    <h1>Edit Produk</h1>

    <form
        method="POST"
        action="/admin/produk/{{ $produk->id }}"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')

        <label>Nama Produk</label>

        <input
            type="text"
            name="nama_produk"
            value="{{ $produk->nama_produk }}"
        >

        <br><br>

        <label>Harga Produk</label>

        <input
            type="number"
            name="harga_produk"
            value="{{ $produk->harga_produk }}"
        >

        <br><br>

        <label>Stok</label>

        <input
            type="number"
            name="stok"
            value="{{ $produk->stok }}"
        >

        <br><br>

        <label>Kategori</label>

        <select name="kategori_id">

            @foreach($kategori as $k)

            <option
                value="{{ $k->id }}"
                {{ $produk->kategori_id == $k->id ? 'selected' : '' }}
            >
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

        @if($produk->foto)

            <img
                src="/uploads/{{ $produk->foto }}"
                width="120"
            >

            <br><br>

        @endif

        <button type="submit">
            Update
        </button>

    </form>

</div>

@endsection
```
