<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index()
    {
        $profils = Profil::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.profil.index', compact('profils'));
    }

    public function create()
    {
        return view('pages.profil.create');
    }

    public function store(Request $request)
    {
        // =======================================================
        // == PERBAIKAN: Mengganti 'nullable' menjadi 'required' ==
        // =======================================================
        $data = $request->validate([
            'nama_desa'     => 'required|string|max:255',
            'kecamatan'     => 'required|string|max:255',
            'kabupaten'     => 'required|string|max:255',
            'provinsi'      => 'required|string|max:255',
            'alamat_kantor' => 'nullable|string|max:255',
            'email'         => 'nullable|email|max:255|unique:profils,email', // Tambah unique
            'telepon'       => 'nullable|string|max:50',
            'visi'          => 'nullable|string',
            'misi'          => 'nullable|string',
            'logo'          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Tangani upload file logo jika ada
        $tmpLogo = null;
        if ($request->hasFile('logo')) {
            $tmpLogo = $request->file('logo')->store('uploads/profils', 'public');
        }

        // =======================================================
        // == PERBAIKAN: Hapus 'logo' dari data sebelum create ==
        // == Karena logo disimpan di tabel 'media', bukan 'profils'
        // =======================================================
        unset($data['logo']);

        $profil = Profil::create($data);

        // Jika ada logo yang di-upload, buat record media terkait
        if ($tmpLogo) {
            Media::create([
                'ref_table' => 'profils',
                'ref_id' => $profil->profil_id,
                'file_url' => $tmpLogo,
                'mime_type' => $request->file('logo')->getClientMimeType(),
            ]);
        }
        return redirect()->route('profil.index')->with('success', 'Profil berhasil ditambahkan.');
    }

    public function show(Profil $profil)
    {
        return view('pages.profil.show', compact('profil'));
    }

    public function edit(Profil $profil)
    {
        return view('pages.profil.edit', compact('profil'));
    }

    public function update(Request $request, Profil $profil)
    {
        // =======================================================
        // == PERBAIKAN: Mengganti 'nullable' menjadi 'required' ==
        // =======================================================
        $data = $request->validate([
            'nama_desa'     => 'required|string|max:255',
            'kecamatan'     => 'required|string|max:255',
            'kabupaten'     => 'required|string|max:255',
            'provinsi'      => 'required|string|max:255',
            'alamat_kantor' => 'nullable|string|max:255',
            // Tambah rule unique dengan pengecualian ID saat ini
            'email'         => 'nullable|email|max:255|unique:profils,email,' . $profil->profil_id . ',profil_id',
            'telepon'       => 'nullable|string|max:50',
            'visi'          => 'nullable|string',
            'misi'          => 'nullable|string',
            'logo'          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Jika ada file baru, upload dan hapus file lama jika ada
        if ($request->hasFile('logo')) {
            // hapus file lama jika ada pada media
            $old = $profil->media()->orderBy('sort_order')->first(); // Menggunakan first() seperti di kode Anda
            if ($old && Storage::disk('public')->exists($old->file_url)) {
                Storage::disk('public')->delete($old->file_url);
                $old->delete();
            }
            $path = $request->file('logo')->store('uploads/profils', 'public');
            // buat media baru
            Media::create([
                'ref_table' => 'profils',
                'ref_id' => $profil->profil_id,
                'file_url' => $path,
                'mime_type' => $request->file('logo')->getClientMimeType(),
            ]);
        }

        // =======================================================
        // == PERBAIKAN: Hapus 'logo' dari data sebelum update ==
        // =======================================================
        unset($data['logo']);

        $profil->update($data);
        return redirect()->route('profil.index')->with('success', 'Profil berhasil diupdate.');
    }

    public function destroy(Profil $profil)
    {
        // Hapus semua media terkait (file + record)
        foreach ($profil->media as $m) {
            if ($m->file_url && Storage::disk('public')->exists($m->file_url)) {
                Storage::disk('public')->delete($m->file_url);
            }
            $m->delete();
        }

        $profil->delete();
        return redirect()->route('profil.index')->with('success', 'Profil berhasil dihapus.');
    }
}
