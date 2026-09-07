<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Menampilkan daftar berita pada halaman admin.
     */
    public function index()
    {
        $beritas = Berita::orderBy('created_at', 'desc')->get();

        return view('pages.admin.kelola_berita', compact('beritas'));
    }

    /**
     * Menampilkan form tambah berita.
     */
    public function create()
    {
        return view('pages.admin.create_berita');
    }

    /**
     * Menyimpan berita baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'category'          => 'required|string|max:100',
            'divisi'            => 'required|string|max:255',
            'lokasi'            => 'required|string|max:255',
            'tanggal_kegiatan'  => 'required|date',
            'is_proker'         => 'nullable|boolean',
            'image'             => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'content'           => 'required|string',
        ]);

        /*
        |--------------------------------------------------------------------------
        | SIMPAN GAMBAR
        |--------------------------------------------------------------------------
        */

        $imagePath = $request->file('image')->store('berita', 'public');

        /*
        |--------------------------------------------------------------------------
        | SIMPAN DATA BERITA
        |--------------------------------------------------------------------------
        */

        Berita::create([
            'title'            => $validated['title'],
            'category'         => $validated['category'],
            'divisi'           => $validated['divisi'],
            'lokasi'           => $validated['lokasi'],
            'tanggal_kegiatan' => $validated['tanggal_kegiatan'],
            'is_proker'        => $request->boolean('is_proker'),
            'image'            => $imagePath,
            'content'          => $validated['content'],
        ]);

        return redirect('/admin/berita')
            ->with('success', 'Berita berhasil ditambahkan.');
    }
}