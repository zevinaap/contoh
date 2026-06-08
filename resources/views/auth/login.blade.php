@extends('layouts.master')

@section('content')

<div class="card" style="max-width:400px; margin:auto;">

    <h1>Login POS</h1>

    @if(session('error'))

        <p style="color:red;">
            {{ session('error') }}
        </p>

    @endif

    <form method="POST" action="/login">

        @csrf

        <label>Username</label>

        <input type="text" name="username">

        <label>Password</label>

        <input type="password" name="password">

        <button type="submit">
            Login
        </button>

    </form>

</div>

@endsection