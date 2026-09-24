<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AgendaController extends Controller
{
    public function index(): View
    {
        $agendas = Agenda::orderBy('tanggal_agenda')
            ->orderBy('waktu_agenda')
            ->get();

        return view('pages.admin.agenda', compact('agendas'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'judul'          => ['required', 'string', 'max:150'],
            'divisi'         => ['required', 'string', 'max:100'],
            'tanggal_agenda' => ['required', 'date'],
            'waktu_agenda'   => ['required'],
            'lokasi'         => ['required', 'string', 'max:150'],
        ]);

        Agenda::create($validated);

        return redirect()
            ->route('admin.agenda.index')
            ->with('success', 'Agenda mendatang berhasil ditambahkan.');
    }

    public function destroy(Agenda $agenda): RedirectResponse
    {
        $agenda->delete();

        return redirect()
            ->route('admin.agenda.index')
            ->with('success', 'Agenda berhasil dihapus.');
    }
}