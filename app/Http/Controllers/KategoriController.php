<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();

        return view('admin.kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/admin/kategori');
    }

    public function show(string $id)
    {
        $kategori = Kategori::find($id);

        return view('admin.kategori.show', compact('kategori'));
    }

    public function edit(string $id)
    {
        $kategori = Kategori::find($id);

        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, string $id)
    {
        $kategori = Kategori::find($id);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/admin/kategori');
    }

    public function destroy(string $id)
    {
        Kategori::destroy($id);

        return redirect('/admin/kategori');
    }
}