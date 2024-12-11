<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\DokumenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\PengajuanController;
use App\Http\Controllers\API\JadwalController;
use App\Http\Controllers\API\NotifikasiController;


Route::post('/login', [AuthController::class, 'login'])->name('logins');
Route::post('/logout', [AuthController::class, 'logout']);


Route::prefix('nr')->group(function(){
        // Routes untuk Users
    Route::get('/users', [UsersController::class, 'index']);
    Route::post('/users/post', [UsersController::class, 'store']);
    Route::get('/users/{id}', [UsersController::class, 'show']);
    Route::put('/users/update/{id}', [UsersController::class, 'update']);
    Route::delete('/users/delete/{id}', [UsersController::class, 'destroy']);

    // Routes untuk Pengajuan
    Route::get('/submission', [PengajuanController::class, 'index']);
    Route::post('/submission/post', [PengajuanController::class, 'store']);
    Route::get('/submission/{id}', [PengajuanController::class, 'show']);
    Route::put('/submission/update/{id}', [PengajuanController::class, 'update']);
    Route::delete('/submission/delete/{id}', [PengajuanController::class, 'destroy']);

    // Routes untuk Jadwal
    Route::get('schedules', [JadwalController::class, 'index']);
    Route::post('schedules/post', [JadwalController::class, 'store']);
    Route::get('schedules/{id}', [JadwalController::class, 'show']);
    Route::put('schedules/update/{id}', [JadwalController::class, 'update']);
    Route::delete('schedules/delete/{id}', [JadwalController::class, 'destroy']);

    // Routes untuk Notifikasi
    Route::get('notification', [NotifikasiController::class, 'index']);
    Route::post('notification/post', [NotifikasiController::class, 'store']);
    Route::get('notification/{id}', [NotifikasiController::class, 'show']);
    Route::put('notification/update/{id}', [NotifikasiController::class, 'update']);
    Route::delete('notification/delete/{id}', [NotifikasiController::class, 'destroy']);

    // Routes untuk Dokumen
    Route::get('document', [DokumenController::class, 'index']);
    Route::post('document/post', [DokumenController::class, 'store']);
    Route::delete('document/delete/{id}', [DokumenController::class, 'destroy']);
    });


//penulisan route http://127.0.0.1:8000/api/super/(routenya contoh = users)
Route::prefix('super')->name('super_admin.')->group(function(){
    Route::middleware('can:manage')->group(function(){
        // Routes untuk Users
    Route::get('/users', [UsersController::class, 'index']);
    Route::post('/users/post', [UsersController::class, 'store']);
    Route::get('/users/{user}', [UsersController::class, 'show']);
    Route::put('/users/{user}', [UsersController::class, 'update']);
    Route::delete('/users/{user}', [UsersController::class, 'destroy']);

    // Routes untuk Pengajuan
    Route::get('/submission', [PengajuanController::class, 'index']);
    Route::post('/submission/post', [PengajuanController::class, 'store']);
    Route::get('/submission/{id}', [PengajuanController::class, 'show']);
    Route::put('/submission/{id}', [PengajuanController::class, 'update']);
    Route::delete('/submission/{id}', [PengajuanController::class, 'destroy']);

    // Routes untuk Jadwal
    Route::get('schedules', [JadwalController::class, 'index']);
    Route::post('schedules/post', [JadwalController::class, 'store']);
    Route::get('schedules/{id}', [JadwalController::class, 'show']);
    Route::put('schedules/{id}', [JadwalController::class, 'update']);
    Route::delete('schedules/{id}', [JadwalController::class, 'destroy']);

    // Routes untuk Notifikasi
    Route::get('notification', [NotifikasiController::class, 'index']);
    Route::post('notification/post', [NotifikasiController::class, 'store']);
    Route::get('notification/{id}', [NotifikasiController::class, 'show']);
    Route::put('notification/{id}', [NotifikasiController::class, 'update']);
    Route::delete('notification/{id}', [NotifikasiController::class, 'destroy']);

    // Routes untuk Dokumen
    Route::get('document', [DokumenController::class, 'index']);
    Route::post('document/post', [DokumenController::class, 'store']);
    Route::delete('document/{id}', [DokumenController::class, 'destroy']);
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
         Route::post('/submission/post', [PengajuanController::class, 'store']);
         Route::get('/submission/{id}', [PengajuanController::class, 'show']);
         Route::put('/submission/{id}', [PengajuanController::class, 'update']);

         // Routes untuk Jadwal
         Route::get('schedules', [JadwalController::class, 'index']);
         Route::get('schedules/{id}', [JadwalController::class, 'show']);
         Route::put('schedules/{id}', [JadwalController::class, 'update']);

         // Routes untuk Notifikasi
         Route::get('notification', [NotifikasiController::class, 'index']);
         Route::get('notification/{id}', [NotifikasiController::class, 'show']);
         Route::put('notification/{id}', [NotifikasiController::class, 'update']);
});
//penulisan route http://127.0.0.1:8000/api/user/(route)
Route::prefix('user')->name('user.')->group(function(){
    Route::middleware('can:make') -> group(function(){
        Route::get('schedules', [JadwalController::class, 'index']);
        Route::post('schedules/post', [JadwalController::class, 'store']);
        Route::get('schedules/{id}', [JadwalController::class, 'show']);

        // Routes untuk Pengajuan
        Route::get('/submission', [PengajuanController::class, 'index']);
        Route::post('/submission/post', [PengajuanController::class, 'store']);
        Route::get('/submission/{id}', [PengajuanController::class, 'show']);
      // routes dokumen
        Route::get('document', [DokumenController::class, 'index']); // Menampilkan semua dokumen
        Route::post('document/post', [DokumenController::class, 'store']); // Menyimpan dokumen baru
    });
});});


