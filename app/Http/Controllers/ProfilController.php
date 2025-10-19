<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $profils = Profil::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.profil.index', compact('profils'));
    }

    public function create()
    {
        return view('admin.profil.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'profil_id' => 'required|string|unique:profils,profil_id',
            'nama_desa' => 'nullable|string',
            'kecamatan' => 'nullable|string',
            'kabupaten' => 'nullable|string',
            'provinsi' => 'nullable|string',
            'alamat_kantor' => 'nullable|string',
            'email' => 'nullable|email',
            'telepon' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'logo' => 'nullable|string',
        ]);

        Profil::create($data);
        return redirect()->route('profil.index')->with('success', 'Profil berhasil ditambahkan.');
    }

    public function show(Profil $profil)
    {
        return view('admin.profil.show', compact('profil'));
    }

    public function edit(Profil $profil)
    {
        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request, Profil $profil)
    {
        $data = $request->validate([
            'profil_id' => 'required|string|unique:profils,profil_id,' . $profil->id,
            'nama_desa' => 'nullable|string',
            'kecamatan' => 'nullable|string',
            'kabupaten' => 'nullable|string',
            'provinsi' => 'nullable|string',
            'alamat_kantor' => 'nullable|string',
            'email' => 'nullable|email',
            'telepon' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'logo' => 'nullable|string',
        ]);

        $profil->update($data);
        return redirect()->route('profil.index')->with('success', 'Profil berhasil diupdate.');
    }

    public function destroy(Profil $profil)
    {
        $profil->delete();
        return redirect()->route('profil.index')->with('success', 'Profil berhasil dihapus.');
    }
}
