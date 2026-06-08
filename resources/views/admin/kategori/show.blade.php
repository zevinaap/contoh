@extends('layouts.master')

@section('content')

<div class="card">

    <h1>Detail Kategori</h1>

    <table>

        <tr>
            <th>ID</th>
            <td>{{ $kategori->id }}</td>
        </tr>

        <tr>
            <th>Nama Kategori</th>
            <td>{{ $kategori->nama_kategori }}</td>
        </tr>

        <tr>
            <th>Keterangan</th>
            <td>{{ $kategori->keterangan }}</td>
        </tr>

    </table>

    <br>

    <a href="/admin/kategori">
        <button>Kembali</button>
    </a>

</div>

@endsection