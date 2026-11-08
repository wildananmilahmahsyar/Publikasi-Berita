<?php

namespace App\Http\Controllers;

use App\Models\ProgramKerja;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProgramKerjaController extends Controller
{
    public function index(): View
    {
        $programKerjas = ProgramKerja::orderBy('divisi')
            ->orderBy('nama_program')
            ->get();

        $divisiTetap = [
            'Humas',
            'Internal & Kaderisasi',
            'Minat, Bakat & Olahraga',
            'Dana & Usaha (Danus)',
        ];

        // Semua divisi default muncul (termasuk yang masih 0 proker).
        // Divisi baru yang dicatat sekretaris juga muncul otomatis.
        $daftarDivisi = collect($divisiTetap)
            ->merge($programKerjas->pluck('divisi'))
            ->unique()
            ->values();

        return view('pages.admin.program_kerja', compact('programKerjas', 'daftarDivisi'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->rules());
        ProgramKerja::create($validated);

        return redirect()->route('admin.program-kerja.index')
            ->with('success', 'Program kerja berhasil ditambahkan.');
    }

    public function update(Request $request, ProgramKerja $programKerja): RedirectResponse
    {
        $validated = $request->validate($this->rules());
        $programKerja->update($validated);

        return redirect()->route('admin.program-kerja.index')
            ->with('success', 'Program kerja berhasil diperbarui.');
    }

    public function destroy(ProgramKerja $programKerja): RedirectResponse
    {
        $programKerja->delete();

        return redirect()->route('admin.program-kerja.index')
            ->with('success', 'Program kerja berhasil dihapus.');
    }

    private function rules(): array
    {
        return [
            'nama_program' => ['required', 'string', 'max:180'],
            'divisi' => ['required', 'string', 'max:100'],
            'catatan' => ['nullable', 'string', 'max:2000'],
        ];
    }
}
