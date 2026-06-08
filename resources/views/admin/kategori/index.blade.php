@extends('layouts.master')

@section('content')

<h1>Data Kategori</h1>

<a href="/admin/kategori/create">+ Tambah Kategori</a>

<hr>

<table border="1" width="100%" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Nama Kategori</th>
        <th>Keterangan</th>
        <th>Aksi</th>
    </tr>

    @foreach($kategori as $k)
    <tr>
        <td>{{ $k->id }}</td>
        <td>{{ $k->nama_kategori }}</td>
        <td>{{ $k->keterangan }}</td>
        <td>
            <a href="/admin/kategori/{{ $k->id }}">Detail</a> |
            <a href="/admin/kategori/{{ $k->id }}/edit">Edit</a> |
            <form action="/admin/kategori/{{ $k->id }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Hapus kategori?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

@endsection