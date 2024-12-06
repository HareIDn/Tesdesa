<?php

use App\Http\Controllers\API\DokumenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\PengajuanController;
use App\Http\Controllers\API\JadwalController;
use App\Http\Controllers\API\NotifikasiController;


//penulisan route http://127.0.0.1:8000/api/super/(routenya contoh = users)
Route::prefix('super')->name('super_admin.')->group(function(){
    Route::middleware('can:manage')->group(function(){
        // Routes untuk Users
    Route::get('/users', [UsersController::class, 'index']);
    Route::post('/users', [UsersController::class, 'store']);
    Route::get('/users/{user}', [UsersController::class, 'show']);
    Route::put('/users/{user}', [UsersController::class, 'update']);
    Route::delete('/users/{user}', [UsersController::class, 'destroy']);

    // Routes untuk Pengajuan
    Route::get('/submission', [PengajuanController::class, 'index']);
    Route::post('/submission', [PengajuanController::class, 'store']);
    Route::get('/submission/{id}', [PengajuanController::class, 'show']);
    Route::put('/submission/{id}', [PengajuanController::class, 'update']);
    Route::delete('/submission/{id}', [PengajuanController::class, 'destroy']);

    // Routes untuk Jadwal
    Route::get('jadwals', [JadwalController::class, 'index']);
    Route::post('jadwals', [JadwalController::class, 'store']);
    Route::get('jadwals/{id}', [JadwalController::class, 'show']);
    Route::put('jadwals/{id}', [JadwalController::class, 'update']);
    Route::delete('jadwals/{id}', [JadwalController::class, 'destroy']);

    // Routes untuk Notifikasi
    Route::get('notifikasi', [NotifikasiController::class, 'index']);
    Route::post('notifikasi', [NotifikasiController::class, 'store']);
    Route::get('notifikasi/{id}', [NotifikasiController::class, 'show']);
    Route::put('notifikasi/{id}', [NotifikasiController::class, 'update']);
    Route::delete('notifikasi/{id}', [NotifikasiController::class, 'destroy']);

    // Routes untuk Dokumen
    Route::get('dokumen', [DokumenController::class, 'index']);
    Route::post('dokumen', [DokumenController::class, 'store']);
    Route::delete('dokumen/{id}', [DokumenController::class, 'destroy']);
    });
});
//penulisan route http://127.0.0.1:8000/api/admin/(route)
Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware('can:manage')->group(function(){
         // Routes untuk Users
         Route::get('/users/{user}', [UsersController::class, 'show']);
         Route::put('/users/{user}', [UsersController::class, 'update']);

         // Routes untuk Pengajuan
         Route::get('/submission', [PengajuanController::class, 'index']);
         Route::post('/submission', [PengajuanController::class, 'store']);
         Route::get('/submission/{id}', [PengajuanController::class, 'show']);
         Route::put('/submission/{id}', [PengajuanController::class, 'update']);

         // Routes untuk Jadwal
         Route::get('jadwals', [JadwalController::class, 'index']);
         Route::get('jadwals/{id}', [JadwalController::class, 'show']);
         Route::put('jadwals/{id}', [JadwalController::class, 'update']);

         // Routes untuk Notifikasi
         Route::get('notifikasi', [NotifikasiController::class, 'index']);
         Route::get('notifikasi/{id}', [NotifikasiController::class, 'show']);
         Route::put('notifikasi/{id}', [NotifikasiController::class, 'update']);
});
//penulisan route http://127.0.0.1:8000/api/user/(route)
Route::prefix('user')->name('user.')->group(function(){
    Route::middleware('can:make') -> group(function(){
        Route::get('jadwals', [JadwalController::class, 'index']);
        Route::post('jadwals', [JadwalController::class, 'store']);
        Route::get('jadwals/{id}', [JadwalController::class, 'show']);

        // Routes untuk Pengajuan
        Route::get('/submission', [PengajuanController::class, 'index']);
        Route::post('/submission', [PengajuanController::class, 'store']);
        Route::get('/submission/{id}', [PengajuanController::class, 'show']);
      // routes dokumen
        Route::get('dokumen', [DokumenController::class, 'index']); // Menampilkan semua dokumen
        Route::post('dokumen', [DokumenController::class, 'store']); // Menyimpan dokumen baru
    });
});});


