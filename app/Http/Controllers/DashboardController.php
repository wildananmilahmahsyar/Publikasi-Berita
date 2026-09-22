<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Berita;

class DashboardController extends Controller
{
    public function index()
    {
        $beritaActivities = Berita::query()
            ->orderByDesc('updated_at')
            ->limit(10)
            ->get()
            ->map(function (Berita $berita) {
                $isNew = $berita->created_at->equalTo($berita->updated_at);

                return [
                    'activity_at' => $berita->updated_at,
                    'actor' => 'Admin Web (Direksi)',
                    'description' => $isNew
                        ? 'Mempublikasikan Berita: "' . $berita->title . '"'
                        : 'Memperbarui Berita: "' . $berita->title . '"',
                    'status' => $isNew ? 'Success' : 'Updated',
                    'status_class' => $isNew ? 'status-success' : 'status-update',
                ];
            });

        $arsipActivities = Arsip::query()
            ->orderByDesc('updated_at')
            ->limit(10)
            ->get()
            ->map(function (Arsip $arsip) {
                $isNew = $arsip->created_at->equalTo($arsip->updated_at);

                return [
                    'activity_at' => $arsip->updated_at,
                    'actor' => 'Sekretaris',
                    'description' => $isNew
                        ? 'Mengunggah arsip: "' . $arsip->nama_dokumen . '"'
                        : 'Memperbarui arsip: "' . $arsip->nama_dokumen . '"',
                    'status' => $isNew ? 'Archived' : 'Updated',
                    'status_class' => $isNew ? 'status-archive' : 'status-update',
                ];
            });

        $activities = $beritaActivities
            ->concat($arsipActivities)
            ->sortByDesc('activity_at')
            ->take(5)
            ->values();

        return view('pages.admin.dashboard', compact('activities'));
    }
}

