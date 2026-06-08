<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        $cart = session()->get('cart', []);

        return view('kasir.transaksi', compact('produk', 'cart'));
    }

    // ➕ TAMBAH KE CART (AJAX)
    public function addToCart(Request $request)
    {
        $produk = Produk::find($request->id);

        $cart = session()->get('cart', []);

        if (isset($cart[$produk->id])) {
            $cart[$produk->id]['qty']++;
            $cart[$produk->id]['subtotal'] =
                $cart[$produk->id]['qty'] * $produk->harga_produk;
        } else {
            $cart[$produk->id] = [
                'nama' => $produk->nama_produk,
                'harga' => $produk->harga_produk,
                'qty' => 1,
                'subtotal' => $produk->harga_produk
            ];
        }

        session()->put('cart', $cart);

        return view('kasir.cart');
    }

    // 🔄 UPDATE QTY (MASIH FULL RELOAD STYLE)
    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            $cart[$request->id]['qty'] = $request->qty;
            $cart[$request->id]['subtotal'] =
                $cart[$request->id]['qty'] * $cart[$request->id]['harga'];
        }

        session()->put('cart', $cart);

        return redirect()->back();
    }

    // ❌ DELETE CART (AJAX)
    public function deleteCart(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
        }

        session()->put('cart', $cart);

        return view('kasir.cart');
    }

    // 🧾 CHECKOUT (AJAX + JSON RESPONSE)
    public function checkout(Request $request)
{
    $cart = session()->get('cart', []);

    if (!$cart) {
        return response()->json([
            'success' => false,
            'message' => 'Cart kosong'
        ]);
    }

    $total = 0;

    foreach ($cart as $item) {
        $total += $item['subtotal'];
    }

    $transaksi = Transaksi::create([
        'total_harga' => $total,
        'uang_pelanggan' => $request->uang,
        'kembalian' => $request->uang - $total
    ]);

    $items = [];

    foreach ($cart as $id => $item) {
        $produk = Produk::find($id);

$produk->stok -= $item['qty'];

$produk->save();

        DetailTransaksi::create([
            'transaksi_id' => $transaksi->id,
            'produk_id' => $id,
            'qty' => $item['qty'],
            'subtotal' => $item['subtotal']
        ]);

        $items[] = [
            'nama' => $item['nama'],
            'qty' => $item['qty'],
            'subtotal' => $item['subtotal']
        ];
    }

    session()->forget('cart');

    return response()->json([
        'success' => true,
        'total' => $total,
        'uang' => $request->uang,
        'kembalian' => $request->uang - $total,
        'items' => $items
    ]);
}
}