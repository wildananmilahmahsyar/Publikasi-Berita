<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    public function index()
    {
        $arsips = Arsip::orderBy('created_at', 'desc')->get();

        return view('pages.admin.arsip', compact('arsips'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_dokumen' => 'required|string|max:255',
            'nama_dokumen' => 'required|string|max:255',
            'kategori' => 'required|in:Surat Masuk,Surat Keluar,Proposal Kegiatan,Laporan Pertanggungjawaban (LPJ)',
            'file_pdf' => 'required|file|mimes:pdf|max:5120',
        ], [
            'no_dokumen.required' => 'Nomor surat atau kode berkas wajib diisi.',
            'nama_dokumen.required' => 'Nama atau judul dokumen wajib diisi.',
            'kategori.required' => 'Kategori berkas wajib dipilih.',
            'file_pdf.required' => 'File PDF wajib dipilih.',
            'file_pdf.mimes' => 'File yang diunggah harus berformat PDF.',
            'file_pdf.max' => 'Ukuran file PDF maksimal 5 MB.',
        ]);
        $filePath = $request->file('file_pdf')->store('arsip', 'public');

        Arsip::create([
            'no_dokumen' => $validated['no_dokumen'],
            'nama_dokumen' => $validated['nama_dokumen'],
            'kategori' => $validated['kategori'],
            'file_pdf' => $filePath,
        ]);

        return redirect('/admin/arsip')
            ->with('success', 'Arsip berhasil ditambahkan.');
    }

    public function update(Request $request, Arsip $arsip)
    {
        $validated = $request->validate([
            'no_dokumen' => 'required|string|max:255',
            'nama_dokumen' => 'required|string|max:255',
            'kategori' => 'required|in:Surat Masuk,Surat Keluar,Proposal Kegiatan,Laporan Pertanggungjawaban (LPJ)',
            'file_pdf' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        $oldFile = $arsip->file_pdf;
        if ($request->hasFile('file_pdf')) {
            $validated['file_pdf'] = $request->file('file_pdf')->store('arsip', 'public');
        } else {
            unset($validated['file_pdf']);
        }

        $arsip->update($validated);

        if (isset($validated['file_pdf']) && $oldFile) {
            Storage::disk('public')->delete($oldFile);
        }

        return redirect('/admin/arsip')->with('success', 'Arsip berhasil diperbarui.');
    }

    public function destroy(Arsip $arsip)
    {
        $filePath = $arsip->file_pdf;
        $arsip->delete();

        if ($filePath) {
            Storage::disk('public')->delete($filePath);
        }

        return redirect('/admin/arsip')->with('success', 'Arsip berhasil dihapus.');
    }
}
