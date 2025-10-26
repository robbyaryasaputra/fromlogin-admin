<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
        // Validasi input. Form saat ini menggunakan field 'username' — kita anggap sebagai email.
        $request->validate([
            'username' => 'required|email',
            'password' => 'required|string',
        ], [
            'username.required' => 'Email wajib diisi.',
            'username.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $credentials = [
            'email' => $request->username,
            'password' => $request->password,
        ];

        // Coba authenticate menggunakan guard default
        if (Auth::attempt($credentials)) {
            // Regenerate session untuk mencegah session fixation
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard.index'));
        }

        // Jika gagal, kembali ke form login dengan pesan error
        return back()->withErrors(['credentials' => 'Email atau password salah'])->withInput();
    }
}
