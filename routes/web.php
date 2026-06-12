<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// PUBLIC ROUTES
Route::get('/', function () {
    return view('pages.public.home');
});

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

Route::get('/isiberita', function () {
    return view('pages.public.isiberita'); // sesuaikan dengan letak folder isiberita lu
});

// ADMIN ROUTES
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('pages.admin.dashboard');
    });
});

Route::get('/admin/berita/create', function () {
    return view('pages.admin.create_berita');
});

Route::get('/admin/profil', function () {
    return view('pages.admin.edit_profil');
});

Route::get('/admin/pesan', function () {
    return view('pages.admin.pesan_kontak');
});

Route::get('/admin/pengurus', function () {
    return view('pages.admin.pengurus');
});

Route::get('/admin/arsip', function () {
    return view('pages.admin.arsip');
});


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// ADMIN ROUTES
Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('pages.admin.dashboard');
    });

    // KHUSUS ADMIN WEB
    Route::middleware('role:admin_web')->group(function () {
        Route::get('/berita/create', function () {
            return view('pages.admin.create_berita');
        });

        Route::get('/profil', function () {
            return view('pages.admin.edit_profil');
        });

        Route::get('/pesan', function () {
            return view('pages.admin.pesan_kontak');
        });
    });

    // KHUSUS SEKRETARIS
    Route::middleware('role:sekretaris')->group(function () {
        Route::get('/pengurus', function () {
            return view('pages.admin.pengurus');
        });

        Route::get('/arsip', function () {
            return view('pages.admin.arsip');
        });
    });

});