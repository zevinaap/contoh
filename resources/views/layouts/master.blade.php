<!DOCTYPE html>
<html>
<head>
    <title>POS Skincare</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

<nav>

    <a href="/">Landing</a>

    @if(session('login'))

        @if(session('role') == 'admin')

            <a href="/admin/dashboard">Dashboard</a>

            <a href="/admin/kategori">Kategori</a>

            <a href="/admin/produk">Produk</a>

        @endif


        @if(session('role') == 'kasir')

            <a href="/kasir/transaksi">Kasir</a>

        @endif

        <a href="/logout">Logout</a>

    @else

        <a href="/login">Login</a>

    @endif

</nav>

<div class="container">
    @yield('content')
</div>

<script src="/js/cart.js"></script>

</body>
</html>