<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;

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
}