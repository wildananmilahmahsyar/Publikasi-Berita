<?php

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

Route::get('/profil', function () {
    return view('pages.public.profil');
});

Route::get('/kegiatan', function () {
    return view('pages.public.kegiatan');
});

Route::get('/laporan', function () {
    return view('pages.public.laporan');
});

Route::get('/kontak', function () {
    return view('pages.public.kontak');
});

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

    Route::get('/', function () {
        return view('pages.admin.dashboard');
    });


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


        /*
        |--------------------------------------------------------------------------
        | PROFIL
        |--------------------------------------------------------------------------
        */

        Route::get('/profil', function () {
            return view('pages.admin.edit_profil');
        });


        /*
        |--------------------------------------------------------------------------
        | PESAN
        |--------------------------------------------------------------------------
        */

        Route::get('/pesan', function () {
            return view('pages.admin.pesan_kontak');
        });
    });


    /*
    |--------------------------------------------------------------------------
    | KHUSUS SEKRETARIS
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:sekretaris')->group(function () {

        Route::get('/pengurus', function () {
            return view('pages.admin.pengurus');
        });

        Route::get('/arsip', [ArsipController::class, 'index']);
        Route::post('/arsip', [ArsipController::class, 'store']);
    });

});