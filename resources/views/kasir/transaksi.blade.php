@extends('layouts.master')

@section('content')

<h1>Kasir POS Skincare</h1>

<div class="flex">

    <!-- PRODUK -->
    <div class="produk-box">

        <h3>Produk</h3>

        <div style="display:grid; grid-template-columns:repeat(2,1fr); gap:15px;">

            @foreach($produk as $p)

            <div class="card">

                @if($p->foto)

                    <img
                        src="/uploads/{{ $p->foto }}"
                        width="100%"
                        style="height:180px; object-fit:cover; border-radius:10px;"
                    >

                @endif

                <br><br>

                <h3>
                    {{ $p->nama_produk }}
                </h3>

                <p>
                    Rp {{ number_format($p->harga_produk) }}
                </p>

                <p>
                    Stok: {{ $p->stok }}
                </p>

                @if($p->stok > 0)

                    <button
                        style="width:100%;"
                        onclick="addToCart({{ $p->id }})"
                    >
                        Tambah ke Cart
                    </button>

                @else

                    <button
                        style="width:100%; background:gray;"
                        disabled
                    >
                        Stok Habis
                    </button>

                @endif

            </div>

            @endforeach

        </div>

    </div>

    <!-- CART -->
    <div class="cart-box">

        <div class="card">

            <h3>Cart</h3>

            <div id="cartBox">
                @include('kasir.cart')
            </div>

            <hr>

            <form onsubmit="checkout(event)">

                <input
                    type="number"
                    id="uang"
                    placeholder="Uang pelanggan"
                    required
                >

                <button
                    type="submit"
                    style="width:100%;"
                >
                    Bayar
                </button>

            </form>

        </div>

    </div>

</div>


<!-- MODAL STRUK -->
<div class="modal" id="strukModal">

    <div class="modal-content">

        <h2>Struk Pembelian</h2>

        <div id="strukContent"></div>

        <br>

        <button onclick="printStruk()">
            Print
        </button>

        <button onclick="closeStruk()">
            Selesai
        </button>

    </div>

</div>

@endsection

