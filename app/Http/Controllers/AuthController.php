<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function index()
    {
        return view('login-form');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => [
                'required',
                'min:3',
                'regex:/[A-Z]/'
            ],
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal harus 3 karakter.',
            'password.regex' => 'Password harus mengandung setidaknya satu huruf kapital.',
        ]);

    // Jika validasi lolos, tampilkan halaman login-success
    return view('login-success', ['username' => $request->username]);
    }
}
