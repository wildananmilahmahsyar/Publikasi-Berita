<?php

use App\Http\Controllers\ProfilController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ArsipController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [BeritaController::class, 'home']);

Route::get('/profil', [ProfilController::class, 'show'])->name('profil');

Route::get('/kegiatan', [BeritaController::class, 'kegiatan'])
    ->name('kegiatan');

Route::get('/laporan', function () {
    $prokerTerbaru = \App\Models\Berita::where('is_proker', true)
        ->orderByDesc('tanggal_kegiatan')
        ->orderByDesc('id')
        ->limit(5)
        ->get();

    // CONF-PAR-2: Rekapitulasi dinamis per divisi.
    $normalisasiDivisi = static function (?string $nama): string {
        $asal = trim($nama ?? '');
        $teks = strtolower($asal);

        return match (true) {
            str_contains($teks, 'humas') || str_contains($teks, 'hubungan masyarakat') => 'Humas',
            str_contains($teks, 'kaderisasi') => 'Internal & Kaderisasi',
            str_contains($teks, 'minat') || str_contains($teks, 'bakat') || str_contains($teks, 'olahraga') => 'Minat, Bakat & Olahraga',
            str_contains($teks, 'danus') || str_contains($teks, 'dana & usaha') => 'Dana & Usaha (Danus)',
            default => $asal !== '' ? $asal : 'Belum ditentukan',
        };
    };

    $divisiTetap = [
        'Humas',
        'Internal & Kaderisasi',
        'Minat, Bakat & Olahraga',
        'Dana & Usaha (Danus)',
    ];

    $rekap = collect($divisiTetap)->mapWithKeys(static fn ($divisi) => [
        $divisi => [
            'divisi' => $divisi,
            'target' => 0,
            'terlaksana' => 0,
            'publikasi' => 0,
        ],
    ]);

    foreach (\App\Models\ProgramKerja::query()->get(['divisi']) as $rencana) {
        $key = $normalisasiDivisi($rencana->divisi);
        $baris = $rekap->get($key, [
            'divisi' => $key, 'target' => 0, 'terlaksana' => 0, 'publikasi' => 0,
        ]);
        $baris['target']++;
        $rekap->put($key, $baris);
    }

    foreach (\App\Models\Berita::query()->get(['divisi', 'is_proker']) as $berita) {
        $key = $normalisasiDivisi($berita->divisi);
        $baris = $rekap->get($key, [
            'divisi' => $key, 'target' => 0, 'terlaksana' => 0, 'publikasi' => 0,
        ]);
        $baris['publikasi']++;
        if ($berita->is_proker) {
            $baris['terlaksana']++;
        }
        $rekap->put($key, $baris);
    }

    $rekapDivisi = $rekap->values();

    return view('pages.public.laporan', compact('prokerTerbaru', 'rekapDivisi'));
});

Route::get('/kontak', function () {
    return view('pages.public.kontak');
})->name('kontak');

Route::post('/kontak', [\App\Http\Controllers\PesanKontakController::class, 'store'])
    ->name('kontak.store');

Route::get('/isiberita/{berita}', [BeritaController::class, 'show']);


/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index']);

    Route::get('/catatan', [\App\Http\Controllers\CatatanController::class, 'show'])
        ->name('admin.catatan.show');

    Route::put('/catatan', [\App\Http\Controllers\CatatanController::class, 'update'])
        ->name('admin.catatan.update');


    /*
    |--------------------------------------------------------------------------
    | KHUSUS ADMIN WEB
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:admin_web')->group(function () {

        /*
        |--------------------------------------------------------------------------
        | BERITA
        |--------------------------------------------------------------------------
        */

        Route::get('/berita', [BeritaController::class, 'index']);

        Route::get('/berita/create', [BeritaController::class, 'create']);

        Route::post('/berita', [BeritaController::class, 'store']);

        Route::get('/berita/{berita}/edit', [BeritaController::class, 'edit']);

        Route::put('/berita/{berita}', [BeritaController::class, 'update']);

        Route::delete('/berita/{berita}', [BeritaController::class, 'destroy']);


        /*
        |--------------------------------------------------------------------------
        | PROFIL
        |--------------------------------------------------------------------------
        */

        Route::get('/profil', [ProfilController::class, 'edit'])->name('admin.profil.edit');
        Route::put('/profil', [ProfilController::class, 'update'])->name('admin.profil.update');


        /*
        |--------------------------------------------------------------------------
        | PESAN
        |--------------------------------------------------------------------------
        */

        Route::get('/pesan', [\App\Http\Controllers\PesanKontakController::class, 'index'])
            ->name('admin.pesan.index');

        Route::delete('/pesan/{pesanKontak}', [\App\Http\Controllers\PesanKontakController::class, 'destroy'])
            ->name('admin.pesan.destroy');
    });


    /*
    |--------------------------------------------------------------------------
    | KHUSUS SEKRETARIS
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:sekretaris')->group(function () {

        Route::get('/pengurus', [\App\Http\Controllers\PengurusController::class, 'index'])
            ->name('admin.pengurus.index');

        Route::post('/pengurus', [\App\Http\Controllers\PengurusController::class, 'store'])
            ->name('admin.pengurus.store');

        Route::put('/pengurus/{pengurus}', [\App\Http\Controllers\PengurusController::class, 'update'])
            ->name('admin.pengurus.update');

        Route::delete('/pengurus/{pengurus}', [\App\Http\Controllers\PengurusController::class, 'destroy'])
            ->name('admin.pengurus.destroy');

        Route::get('/arsip', [ArsipController::class, 'index']);
        Route::post('/arsip', [ArsipController::class, 'store']);
        Route::put('/arsip/{arsip}', [ArsipController::class, 'update'])->name('admin.arsip.update');
        Route::delete('/arsip/{arsip}', [ArsipController::class, 'destroy'])->name('admin.arsip.destroy');

        Route::get('/program-kerja', [\App\Http\Controllers\ProgramKerjaController::class, 'index'])
            ->name('admin.program-kerja.index');

        Route::post('/program-kerja', [\App\Http\Controllers\ProgramKerjaController::class, 'store'])
            ->name('admin.program-kerja.store');

        Route::put('/program-kerja/{programKerja}', [\App\Http\Controllers\ProgramKerjaController::class, 'update'])
            ->name('admin.program-kerja.update');

        Route::delete('/program-kerja/{programKerja}', [\App\Http\Controllers\ProgramKerjaController::class, 'destroy'])
            ->name('admin.program-kerja.destroy');

        Route::get('/agenda', [\App\Http\Controllers\AgendaController::class, 'index'])
            ->name('admin.agenda.index');

        Route::post('/agenda', [\App\Http\Controllers\AgendaController::class, 'store'])
            ->name('admin.agenda.store');

        Route::delete('/agenda/{agenda}', [\App\Http\Controllers\AgendaController::class, 'destroy'])
            ->name('admin.agenda.destroy');
    });

});
