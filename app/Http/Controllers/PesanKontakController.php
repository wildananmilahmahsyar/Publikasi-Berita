<?php

namespace App\Http\Controllers;

use App\Models\PesanKontak;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PesanKontakController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama'   => ['required', 'string', 'max:100'],
            'email'  => ['required', 'email', 'max:255'],
            'subjek' => ['required', 'string', 'max:150'],
            'pesan'  => ['required', 'string', 'max:5000'],
        ]);

        PesanKontak::create($validated);

        return redirect()
            ->route('kontak')
            ->with('success', 'Pesan berhasil dikirim. Terima kasih telah menghubungi kami.');
    }
}
