<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatatanController extends Controller
{
    public function show(): JsonResponse
    {
        return response()->json([
            'catatans' => Catatan::query()
                ->orderBy('id')
                ->get(['id', 'content', 'updated_at']),
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'catatans' => ['required', 'array', 'min:1', 'max:10'],
            'catatans.*' => ['required', 'string', 'max:1000'],
        ]);

        DB::transaction(function () use ($validated) {
            Catatan::query()->delete();

            foreach ($validated['catatans'] as $content) {
                Catatan::create([
                    'content' => trim($content),
                ]);
            }
        });

        return response()->json([
            'message' => 'Catatan internal berhasil disimpan.',
            'catatans' => Catatan::query()
                ->orderBy('id')
                ->get(['id', 'content', 'updated_at']),
        ]);
    }
}
