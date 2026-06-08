@extends('layouts.master')

@section('content')

<div class="card">

    <h1>Data Produk</h1>

    <a href="/admin/produk/create">
        <button>Tambah Produk</button>
    </a>

    <br><br>

    <table>

        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Kategori</th>
            <th>Aksi</th>
            <th>Foto</th>
        </tr>

        @foreach($produk as $p)

        <tr>

            <td>{{ $p->id }}</td>

            <td>{{ $p->nama_produk }}</td>

            <td>
                Rp {{ number_format($p->harga_produk) }}
            </td>

            <td>{{ $p->stok }}</td>

            <td>{{ $p->kategori->nama_kategori }}</td>
            <td>

    <img
        src="/uploads/{{ $p->foto }}"
        width="80"
    >

</td>

            <td>

                <a href="/admin/produk/{{ $p->id }}/edit">
                    <button>Edit</button>
                </a>

                <form
                    action="/admin/produk/{{ $p->id }}"
                    method="POST"
                    style="display:inline;"
                >
                    @csrf
                    @method('DELETE')

                    <button>
                        Hapus
                    </button>
                </form>

            </td>

        </tr>

        @endforeach

    </table>

</div>

@endsection