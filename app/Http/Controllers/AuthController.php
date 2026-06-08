<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // FORM LOGIN
    public function loginForm()
    {
        return view('auth.login');
    }

    // PROSES LOGIN
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        // ADMIN
        if ($username == 'admin' && $password == 'admin123') {

            session([
                'login' => true,
                'role' => 'admin'
            ]);

            return redirect('/admin/dashboard');
        }

        // KASIR
        if ($username == 'kasir' && $password == 'kasir123') {

            session([
                'login' => true,
                'role' => 'kasir'
            ]);

            return redirect('/kasir/transaksi');
        }

        return redirect()->back()
            ->with('error', 'Username atau password salah');
    }

    // LOGOUT
    public function logout()
    {
        session()->flush();

        return redirect('/');
    }
}