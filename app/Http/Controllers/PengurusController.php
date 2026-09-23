<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PengurusController extends Controller
{
    public function index()
    {
        $pengurus = Pengurus::query()
            ->latest()
            ->get();

        return view('pages.admin.pengurus', compact('pengurus'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => ['required', 'string', 'max:100', 'unique:pengurus,nim'],
            'nama' => ['required', 'string', 'max:255'],
            'jabatan' => ['required', 'string', 'max:255'],
            'divisi' => ['required', 'string', 'max:255'],
            'foto_pengurus' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],
        ]);

        $validated['foto_pengurus'] = $request
            ->file('foto_pengurus')
            ->store('pengurus', 'public');

        Pengurus::create($validated);

        return redirect()
            ->route('admin.pengurus.index')
            ->with('success', 'Data pengurus berhasil disimpan.');
    }

    public function update(Request $request, Pengurus $pengurus)
    {
        $validated = $request->validate([
            'nim' => [
                'required',
                'string',
                'max:100',
                Rule::unique('pengurus', 'nim')->ignore($pengurus->id),
            ],
            'nama' => ['required', 'string', 'max:255'],
            'jabatan' => ['required', 'string', 'max:255'],
            'divisi' => ['required', 'string', 'max:255'],
            'foto_pengurus' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],
        ]);

        if ($request->hasFile('foto_pengurus')) {
            if (
                $pengurus->foto_pengurus &&
                Storage::disk('public')->exists($pengurus->foto_pengurus)
            ) {
                Storage::disk('public')->delete($pengurus->foto_pengurus);
            }

            $validated['foto_pengurus'] = $request
                ->file('foto_pengurus')
                ->store('pengurus', 'public');
        }

        $pengurus->update($validated);

        return redirect()
            ->route('admin.pengurus.index')
            ->with('success', 'Data pengurus berhasil diperbarui.');
    }

    public function destroy(Pengurus $pengurus)
    {
        if (
            $pengurus->foto_pengurus &&
            Storage::disk('public')->exists($pengurus->foto_pengurus)
        ) {
            Storage::disk('public')->delete($pengurus->foto_pengurus);
        }

        $pengurus->delete();

        return redirect()
            ->route('admin.pengurus.index')
            ->with('success', 'Data pengurus berhasil dihapus.');
    }
}