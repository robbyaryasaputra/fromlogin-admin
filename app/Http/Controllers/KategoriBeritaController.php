<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBerita;

class KategoriBeritaController extends Controller
{
    // Menampilkan daftar kategori berita
    public function index()
    {
        $items = KategoriBerita::orderBy('kategori_id', 'desc')->paginate(15);
        return view('admin.kategori-berita.index', compact('items'));
    }

    // Menampilkan form untuk membuat kategori baru
    public function create()
    {
        return view('admin.kategori-berita.create');
    }

    // Menyimpan kategori baru ke database
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:191',
            'slug' => 'nullable|string|max:191|unique:kategori_beritas,slug',
            'deskripsi' => 'nullable|string',
        ]);

        // Jika slug kosong, buat dari nama
        if (empty($data['slug'])) {
            $data['slug'] = \Str::slug($data['nama']);
        }

        KategoriBerita::create($data);

        return redirect()->route('kategori-berita.index')->with('success', 'Kategori berita berhasil ditambahkan');
    }

    // Menampilkan satu kategori
    public function show(KategoriBerita $kategori_beritum)
    {
        //return view('admin.kategori-berita.show', ['item' => $kategori_beritum]);
    }

    // Menampilkan form edit
    public function edit(KategoriBerita $kategori_beritum)
    {
        return view('admin.kategori-berita.edit', ['item' => $kategori_beritum]);
    }

    // Memperbarui kategori
    public function update(Request $request, KategoriBerita $kategori_beritum)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:191',
            'slug' => 'nullable|string|max:191|unique:kategori_beritas,slug,' . $kategori_beritum->kategori_id . ',kategori_id',
            'deskripsi' => 'nullable|string',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = \Str::slug($data['nama']);
        }

    $kategori_beritum->update($data);

        return redirect()->route('kategori-berita.index')->with('success', 'Kategori berita berhasil diperbarui');
    }

    // Menghapus kategori
    public function destroy(KategoriBerita $kategori_beritum)
    {
        $kategori_beritum->delete();
        return redirect()->route('kategori-berita.index')->with('success', 'Kategori berita berhasil dihapus');
    }
}
