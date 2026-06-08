@extends('layouts.master')

@section('content')

<h1>Edit Kategori</h1>

<form method="POST" action="/admin/kategori/{{ $kategori->id }}">
    @csrf
    @method('PUT')

    <input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}">
    <br><br>

    <textarea name="keterangan">{{ $kategori->keterangan }}</textarea>
    <br><br>

    <button type="submit">Update</button>
</form>

@endsection