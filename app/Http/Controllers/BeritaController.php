<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Menampilkan maksimal 20 berita terbaru
     * pada halaman utama pengunjung.
     */
    public function home()
    {
        $beritas = Berita::orderBy('tanggal_kegiatan', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();

        return view('pages.public.home', compact('beritas'));
    }

    /**
     * Menampilkan detail satu berita kepada pengunjung.
     */
    public function show(Berita $berita)
    {
        return view('pages.public.isiberita', compact('berita'));
    }

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
            'title'            => 'required|string|max:255',
            'category'         => 'required|string|max:100',
            'divisi'           => 'required|string|max:255',
            'lokasi'           => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'is_proker'        => 'nullable|boolean',
            'image'            => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'content'          => 'required|string',
        ]);

        $imagePath = $request->file('image')->store('berita', 'public');

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

    /**
     * Menampilkan form edit berita.
     */
    public function edit(Berita $berita)
    {
        return view('pages.admin.edit_berita', compact('berita'));
    }

    /**
     * Memperbarui berita yang sudah tersimpan.
     */
    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'category'         => 'required|string|max:100',
            'divisi'           => 'required|string|max:255',
            'lokasi'           => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'is_proker'        => 'nullable|boolean',
            'image'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'content'          => 'required|string',
        ]);

        $data = [
            'title'            => $validated['title'],
            'category'         => $validated['category'],
            'divisi'           => $validated['divisi'],
            'lokasi'           => $validated['lokasi'],
            'tanggal_kegiatan' => $validated['tanggal_kegiatan'],
            'is_proker'        => $request->boolean('is_proker'),
            'content'          => $validated['content'],
        ];

        if ($request->hasFile('image')) {
            $newImagePath = $request->file('image')->store('berita', 'public');

            if ($berita->image) {
                Storage::disk('public')->delete($berita->image);
            }

            $data['image'] = $newImagePath;
        }

        $berita->update($data);

        return redirect('/admin/berita')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Menghapus berita beserta gambar yang tersimpan.
     */
    public function destroy(Berita $berita)
    {
        $imagePath = $berita->image;

        $berita->delete();

        if ($imagePath) {
            Storage::disk('public')->delete($imagePath);
        }

        return redirect('/admin/berita')
            ->with('success', 'Berita berhasil dihapus.');
    }
}