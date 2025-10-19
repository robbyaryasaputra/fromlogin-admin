<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    /**
     * Tampilkan daftar warga
     */
    public function index()
    {
        $wargas = Warga::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.warga.index', compact('wargas'));
    }

    /**
     * Tampilkan form untuk membuat warga baru
     */
    public function create()
    {
        return view('admin.warga.create');
    }

    /**
     * Simpan warga baru
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'warga_id' => 'required|string|unique:wargas,warga_id',
            'no_ktp' => 'required|string|unique:wargas,no_ktp',
            'nama' => 'required|string|max:191',
            'jenis_kelamin' => 'nullable|string|max:50',
            'agama' => 'nullable|string|max:100',
            'pekerjaan' => 'nullable|string|max:191',
            'telp' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:191',
            'alamat' => 'nullable|string',
        ]);

        Warga::create($data);
        return redirect()->route('warga.index')->with('success', 'Data warga berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail warga
     */
    public function show(Warga $warga)
    {
        return view('admin.warga.show', compact('warga'));
    }

    /**
     * Tampilkan form edit
     */
    public function edit(Warga $warga)
    {
        return view('admin.warga.edit', compact('warga'));
    }

    /**
     * Update data warga
     */
    public function update(Request $request, Warga $warga)
    {
        $data = $request->validate([
            'warga_id' => 'required|string|unique:wargas,warga_id,' . $warga->id,
            'no_ktp' => 'required|string|unique:wargas,no_ktp,' . $warga->id,
            'nama' => 'required|string|max:191',
            'jenis_kelamin' => 'nullable|string|max:50',
            'agama' => 'nullable|string|max:100',
            'pekerjaan' => 'nullable|string|max:191',
            'telp' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:191',
            'alamat' => 'nullable|string',
        ]);

        $warga->update($data);
        return redirect()->route('warga.index')->with('success', 'Data warga berhasil diupdate.');
    }

    /**
     * Hapus warga
     */
    public function destroy(Warga $warga)
    {
        $warga->delete();
        return redirect()->route('warga.index')->with('success', 'Data warga berhasil dihapus.');
    }
}
