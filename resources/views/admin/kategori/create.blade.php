@extends('layouts.master')

@section('content')

<h1>Tambah Kategori</h1>

<form method="POST" action="/admin/kategori">
    @csrf

    <input type="text" name="nama_kategori" placeholder="Nama kategori">
    <br><br>

    <textarea name="keterangan" placeholder="Keterangan"></textarea>
    <br><br>

    <button type="submit">Simpan</button>
</form>

@endsection