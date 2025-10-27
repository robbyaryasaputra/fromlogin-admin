<?php

namespace App\Http\Controllers;

use App\Models\Warga; // Pastikan Anda sudah memiliki Model Warga
use Illuminate\Http\Request;

class WargaController extends Controller
{
    /**
     * Menampilkan daftar warga.
     * Cocok untuk: index.blade.php
     */
    public function index()
    {
        // Mengambil data warga, diurutkan dari yang terbaru, dan paginasi 10 per halaman
        $wargas = Warga::orderBy('created_at', 'desc')->paginate(10);

        // Sesuaikan path view jika berbeda, misal: 'admin.warga.index'
        return view('pages.warga.index', compact('wargas'));
    }

    /**
     * Menampilkan form tambah warga baru.
     * Cocok untuk: create.blade.php
     */
    public function create()
    {
        // Sesuaikan path view jika berbeda, misal: 'admin.warga.create'
        return view('pages.warga.create');
    }

    /**
     * Menyimpan warga baru ke database.
     * INI ADALAH PERBAIKAN UTAMA (VALIDASI)
     */
    public function store(Request $request)
    {
        // =======================================================
        // == PERBAIKAN: Validasi data warga sebelum disimpan ==
        // =======================================================
        $data = $request->validate([
            // 'required' berarti WAJIB diisi
            'no_ktp'        => 'required|string|max:50|unique:wargas,no_ktp',
            'nama'          => 'required|string|max:255',

            // 'nullable' berarti BOLEH kosong
            'jenis_kelamin' => 'nullable|string|in:Laki-laki,Perempuan', // Pastikan nilai sesuai <option>
            'agama'         => 'nullable|string|max:50',
            'pekerjaan'     => 'nullable|string|max:100',
            'telp'          => 'nullable|string|max:20',
            'email'         => 'nullable|email|max:255|unique:wargas,email',
        ]);

        // Jika validasi lolos, buat data warga baru
        Warga::create($data);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('warga.index')->with('success', 'Warga berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit warga.
     * (Route-Model Binding: $warga otomatis diambil dari ID di URL)
     * Cocok untuk: edit.blade.php
     */
    public function edit(Warga $warga)
    {
        // Sesuaikan path view jika berbeda, misal: 'admin.warga.edit'
        return view('pages.warga.edit', compact('warga'));
    }

    /**
     * Memperbarui data warga di database.
     * INI JUGA PERBAIKAN UTAMA (VALIDASI)
     */
    public function update(Request $request, Warga $warga)
    {
        // =======================================================
        // == PERBAIKAN: Validasi data warga sebelum di-update ==
        // =======================================================
        $data = $request->validate([
            // 'required' berarti WAJIB diisi
            // Rule 'unique' di-update agar mengabaikan data saat ini ($warga->warga_id)
            'no_ktp'        => 'required|string|max:50|unique:wargas,no_ktp,' . $warga->warga_id . ',warga_id',
            'nama'          => 'required|string|max:255',

            // 'nullable' berarti BOLEH kosong
            'jenis_kelamin' => 'nullable|string|in:Laki-laki,Perempuan',
            'agama'         => 'nullable|string|max:50',
            'pekerjaan'     => 'nullable|string|max:100',
            'telp'          => 'nullable|string|max:20',
            'email'         => 'nullable|email|max:255|unique:wargas,email,' . $warga->warga_id . ',warga_id',
        ]);

        // Jika validasi lolos, update data warga
        $warga->update($data);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('warga.index')->with('success', 'Data warga berhasil diupdate.');
    }

    /**
     * Menghapus data warga dari database.
     */
    public function destroy(Warga $warga)
    {
        $warga->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('warga.index')->with('success', 'Data warga berhasil dihapus.');
    }
}
