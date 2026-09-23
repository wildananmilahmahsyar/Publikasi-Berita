<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function show()
    {
        $profil = Profil::firstOrFail();

        return view('pages.public.profil', compact('profil'));
    }

    public function edit()
    {
        $profil = Profil::firstOrFail();

        return view('pages.admin.edit_profil', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = Profil::firstOrFail();

        $validated = $request->validate([
            'sejarah' => ['required', 'string'],
            'visi' => ['required', 'string'],
            'misi' => ['required', 'string'],

            'structure_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:3072',
            ],

            'nilai_1_title' => ['required', 'string', 'max:255'],
            'nilai_1_desc' => ['required', 'string'],

            'nilai_2_title' => ['required', 'string', 'max:255'],
            'nilai_2_desc' => ['required', 'string'],

            'nilai_3_title' => ['required', 'string', 'max:255'],
            'nilai_3_desc' => ['required', 'string'],
        ]);

        if ($request->hasFile('structure_image')) {
            if ($profil->structure_image) {
                Storage::disk('public')->delete($profil->structure_image);
            }

            $validated['structure_image'] =
                $request->file('structure_image')->store('profil', 'public');
        }

        $profil->update($validated);

        return redirect()
            ->route('admin.profil.edit')
            ->with('success', 'Profil organisasi berhasil diperbarui.');
    }
}