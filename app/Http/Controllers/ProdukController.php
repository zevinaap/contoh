<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::with('kategori')->get();

        return view('admin.produk.index', compact('produk'));
    }

    public function create()
    {
        $kategori = Kategori::all();

        return view('admin.produk.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $namaFile = null;

if($request->hasFile('foto')){

    $file = $request->file('foto');

    $namaFile = time().'_'.$file->getClientOriginalName();

    $file->move(public_path('uploads'), $namaFile);
}

Produk::create([
    'nama_produk' => $request->nama_produk,
    'harga_produk' => $request->harga_produk,
    'stok' => $request->stok,
    'foto' => $namaFile,
    'kategori_id' => $request->kategori_id
]);

        return redirect('/admin/produk');
    }

    public function edit($id)
    {
        $produk = Produk::find($id);

        $kategori = Kategori::all();

        return view('admin.produk.edit', compact(
            'produk',
            'kategori'
        ));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);

$namaFile = $produk->foto;

if($request->hasFile('foto')){

    $file = $request->file('foto');

    $namaFile = time().'_'.$file->getClientOriginalName();

    $file->move(public_path('uploads'), $namaFile);
}

$produk->update([
    'nama_produk' => $request->nama_produk,
    'harga_produk' => $request->harga_produk,
    'stok' => $request->stok,
    'foto' => $namaFile,
    'kategori_id' => $request->kategori_id
]);

        return redirect('/admin/produk');
    }

    public function destroy($id)
    {
        Produk::destroy($id);

        return redirect('/admin/produk');
    }
}