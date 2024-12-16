<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\DokumenController;
use App\Http\Controllers\API\DokumenSktmController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\PengajuanController;
use App\Http\Controllers\API\JadwalController;
use App\Http\Controllers\API\NotifikasiController;
use App\Http\Controllers\API\PendukungSktmController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\SKTMController;
use App\Http\Controllers\API\DomisiliController;
use App\Http\Controllers\API\SkckController;
use App\Http\Controllers\API\SupportUsahaController;
use App\Http\Controllers\API\StatistikController;


Route::post('/login', [AuthController::class, 'login'])->name('logins');
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/role/{roleName}', [RoleController::class, 'getUsersByRole']);
Route::put('/{userId}/role', [RoleController::class, 'updateUserRole']);
Route::get('/submission', [PengajuanController::class, 'index']);
Route::get('/submission/admin', [PengajuanController::class, 'indexAdmin']);
Route::get('/submission/user', [PengajuanController::class, 'indexUser']);
Route::get('/submission/all', [PengajuanController::class, 'indexAll']);
Route::post('/sktm', [SKTMController::class, 'store']);
Route::get('supSktm', [PendukungSktmController::class, 'index']);
Route::post('supSktm', [PendukungSktmController::class, 'store']);
Route::get('supSktm/{id}', [PendukungSktmController::class, 'show']);
Route::put('supSktm/{id}', [PendukungSktmController::class, 'update']);
Route::delete('supSktm/{id}', [PendukungSktmController::class, 'destroy']);
Route::get('docSktm', [DokumenSktmController::class, 'index']);
Route::post('docSktm', [DokumenSktmController::class, 'store']);

Route::post('/document/post', [DokumenController::class, 'store']);

Route::post('/schedules/post', [JadwalController::class, 'store']);

Route::post('/domisili', [DomisiliController::class, 'store']);
Route::get('/domisili', [DomisiliController::class, 'index']);
Route::get('/domisili/{id}', [DomisiliController::class, 'show']);
Route::put('/domisili/{id}', [DomisiliController::class, 'update']);
Route::delete('/domisili/{id}', [DomisiliController::class, 'destroy']);


Route::post('/skck', [SkckController::class, 'store']);
Route::get('/skck', [SkckController::class, 'index']);
Route::get('/skck/{id}', [SkckController::class, 'show']);
Route::put('/skck/{id}', [SkckController::class, 'update']);
Route::delete('/skck/{id}', [SkckController::class, 'destroy']);
use App\Http\Controllers\API\SuratUsahaController;

Route::get('/usaha', [SuratUsahaController::class, 'index']);
Route::post('/usaha', [SuratUsahaController::class, 'store']);
Route::get('/usaha/{id}', [SuratUsahaController::class, 'show']);
Route::put('/usaha/{id}', [SuratUsahaController::class, 'update']);
Route::delete('/usaha/{id}', [SuratUsahaController::class, 'destroy']);
Route::get('supusaha', [SupportUsahaController::class, 'index']);
Route::get('supusaha/{id}', [SupportUsahaController::class, 'show']);
Route::post('supusaha', [SupportUsahaController::class, 'store']);
Route::put('supusaha/{id}', [SupportUsahaController::class, 'update']);
Route::delete('supusaha/{id}', [SupportUsahaController::class, 'destroy']);


// Route::prefix('nr')->group(function(){
//         // Routes untuk Users
//     Route::get('/users', [UsersController::class, 'index']);
//     Route::post('/users/post', [UsersController::class, 'store']);
//     Route::get('/users/{id}', [UsersController::class, 'show']);
//     Route::put('/users/update/{id}', [UsersController::class, 'update']);
//     Route::delete('/users/delete/{id}', [UsersController::class, 'destroy']);

//     // Routes untuk Pengajuan
//     Route::get('/submission', [PengajuanController::class, 'index']);
//     Route::post('/submission/post', [PengajuanController::class, 'store']);
//     Route::get('/submission/{id}', [PengajuanController::class, 'show']);
//     Route::put('/submission/update/{id}', [PengajuanController::class, 'update']);
//     Route::delete('/submission/delete/{id}', [PengajuanController::class, 'destroy']);

//     // Routes untuk Jadwal
//     Route::get('schedules', [JadwalController::class, 'index']);
//     Route::post('schedules/post', [JadwalController::class, 'store']);
//     Route::get('schedules/{id}', [JadwalController::class, 'show']);
//     Route::put('schedules/update/{id}', [JadwalController::class, 'update']);
//     Route::delete('schedules/delete/{id}', [JadwalController::class, 'destroy']);

//     // Routes untuk Notifikasi
//     Route::get('notification', [NotifikasiController::class, 'index']);
//     Route::post('notification/post', [NotifikasiController::class, 'store']);
//     Route::get('notification/{id}', [NotifikasiController::class, 'show']);
//     Route::put('notification/update/{id}', [NotifikasiController::class, 'update']);
//     Route::delete('notification/delete/{id}', [NotifikasiController::class, 'destroy']);

//     // Routes untuk Dokumen
//     Route::get('document', [DokumenController::class, 'index']);
//     Route::post('document/post', [DokumenController::class, 'store']);
//     Route::delete('document/delete/{id}', [DokumenController::class, 'destroy']);
//     });

Route::middleware(['auth:sanctum'])->group(function() {

    // Routes untuk Super Admin
    Route::prefix('super')->group(function() {
        // Routes untuk Users
        Route::get('/role/{roleName}', [RoleController::class, 'getUsersByRole'])->middleware('role:super_admin|manage');
Route::put('/{userId}/role', [RoleController::class, 'updateUserRole'])->middleware('role:super_admin|manage');
        Route::get('/users', [UsersController::class, 'index'])->middleware('role:super_admin|manage');
        Route::post('/users/post', [UsersController::class, 'store'])->middleware('role:super_admin');
        Route::get('/users/{user}', [UsersController::class, 'show'])->middleware('role:super_admin|manage');
        Route::put('/users/{user}', [UsersController::class, 'update'])->middleware('role:super_admin|manage');
        Route::delete('/users/{user}', [UsersController::class, 'destroy'])->middleware('role:super_admin');

        // Routes untuk Pengajuan
        Route::get('/submission', [PengajuanController::class, 'index'])->middleware('role:super_admin|manage');
        Route::get('/submission/admin', [PengajuanController::class, 'indexAdmin'])->middleware('role:super_admin|manage');
        Route::get('/submission/user', [PengajuanController::class, 'indexUser'])->middleware('role:super_admin|manage');
        Route::get('/submission/all', [PengajuanController::class, 'indexAll'])->middleware('role:super_admin|manage');
        Route::post('/submission/post', [PengajuanController::class, 'store'])->middleware('role:super_admin');
        Route::get('/submission/{id}', [PengajuanController::class, 'show'])->middleware('role:super_admin|manage');
        Route::put('/submission/{id}', [PengajuanController::class, 'update'])->middleware('role:super_admin|manage');
        Route::delete('/submission/{id}', [PengajuanController::class, 'destroy'])->middleware('role:super_admin');

        // Routes untuk Jadwal
        Route::get('/schedules', [JadwalController::class, 'index'])->middleware('role:super_admin|manage');
        Route::post('/schedules/post', [JadwalController::class, 'store'])->middleware('role:super_admin|manage');
        Route::get('/schedules/{id}', [JadwalController::class, 'show'])->middleware('role:super_admin|manage');
        Route::put('/schedules/{id}', [JadwalController::class, 'update'])->middleware('role:super_admin|manage');
        Route::delete('/schedules/{id}', [JadwalController::class, 'destroy'])->middleware('role:super_admin');

        // Routes untuk Notifikasi
        Route::get('/notification', [NotifikasiController::class, 'index'])->middleware('role:super_admin|manage');
        Route::post('/notification/post', [NotifikasiController::class, 'store'])->middleware('role:super_admin|manage');
        Route::get('/notification/{id}', [NotifikasiController::class, 'show'])->middleware('role:super_admin|manage');
        Route::put('/notification/{id}', [NotifikasiController::class, 'update'])->middleware('role:super_admin|manage');
        Route::delete('/notification/{id}', [NotifikasiController::class, 'destroy'])->middleware('role:super_admin');

        // Routes untuk Dokumen
        Route::get('/document', [DokumenController::class, 'index'])->middleware('role:super_admin|manage');
        Route::post('/document/post', [DokumenController::class, 'store'])->middleware('role:super_admin|manage');
        Route::delete('/document/{id}', [DokumenController::class, 'destroy'])->middleware('role:super_admin');

        Route::get('statistik', [StatistikController::class, 'getStatistik'])->middleware('role:super_admin');
        Route::get('montrep', [StatistikController::class, 'getStatistikPerBulan'])->middleware('role:super_admin');
    });

    // Admin Routes
    Route::prefix('admin')->middleware('can:manage')->group(function() {
        Route::get('/users/{user}', [UsersController::class, 'show'])->middleware('role:super_admin|manage');
        Route::put('/users/{user}', [UsersController::class, 'update'])->middleware('role:super_admin|manage');

        Route::get('/submission', [PengajuanController::class, 'index'])->middleware('role:super_admin|manage');
        Route::post('/submission/post', [PengajuanController::class, 'store'])->middleware('role:super_admin|manage');
        Route::get('/submission/{id}', [PengajuanController::class, 'show'])->middleware('role:super_admin|manage');
        Route::put('/submission/{id}', [PengajuanController::class, 'update'])->middleware('role:super_admin|manage');

        Route::get('/schedules', [JadwalController::class, 'index'])->middleware('role:super_admin|manage');
        Route::get('/schedules/{id}', [JadwalController::class, 'show'])->middleware('role:super_admin|manage');
        Route::put('/schedules/{id}', [JadwalController::class, 'update'])->middleware('role:super_admin|manage');

        Route::get('/notification', [NotifikasiController::class, 'index'])->middleware('role:super_admin|manage');
        Route::get('/notification/{id}', [NotifikasiController::class, 'show'])->middleware('role:super_admin|manage');
        Route::put('/notification/{id}', [NotifikasiController::class, 'update'])->middleware('role:super_admin|manage');
        Route::get('statistik', [StatistikController::class, 'getStatistik'])->middleware('role:super_admin');
        Route::get('montrep', [StatistikController::class, 'getStatistikPerBulan'])->middleware('role:super_admin');
    });

    // User Routes
    Route::prefix('user')->middleware('can:make')->group(function() {
        Route::post('/skck', [SkckController::class, 'store'])->middleware('role:user|make');
        Route::get('/skck', [SkckController::class, 'index'])->middleware('role:user|make');
        Route::get('/skck/{id}', [SkckController::class, 'show'])->middleware('role:user|make');
        Route::put('/skck/{id}', [SkckController::class, 'update'])->middleware('role:user|make');
        Route::delete('/skck/{id}', [SkckController::class, 'destroy'])->middleware('role:user|make');
        Route::post('/domisili', [DomisiliController::class, 'store'])->middleware('role:user|make');
        Route::post('supSktm', [PendukungSktmController::class, 'store'])->middleware('role:user|make');
        Route::get('/domisili', [DomisiliController::class, 'index'])->middleware('role:user|make');
        Route::post('supSktm', [PendukungSktmController::class, 'store'])->middleware('role:user|make');
        Route::get('/domisili/{id}', [DomisiliController::class, 'show'])->middleware('role:user|make');
        Route::post('supSktm', [PendukungSktmController::class, 'store'])->middleware('role:user|make');
        Route::put('/domisili/{id}', [DomisiliController::class, 'update'])->middleware('role:user|make');
        Route::post('supSktm', [PendukungSktmController::class, 'store'])->middleware('role:user|make');
        Route::delete('/domisili/{id}', [DomisiliController::class, 'destroy'])->middleware('role:user|make');
        Route::post('supSktm', [PendukungSktmController::class, 'store'])->middleware('role:user|make');
        Route::post('/sktm', [SKTMController::class, 'store'])->middleware('role:user|make')->middleware('role:user|make');
        Route::post('supSktm', [PendukungSktmController::class, 'store'])->middleware('role:user|make');
        // Route::resource('/sktm', [SKTMController::class])->middleware('role:user|make');
        Route::get('supSktm', [PendukungSktmController::class, 'index'])->middleware('role:user|make');
        Route::post('supSktm', [PendukungSktmController::class, 'store'])->middleware('role:user|make');
        Route::get('supSktm/{id}', [PendukungSktmController::class, 'show'])->middleware('role:user|make');
        Route::put('supSktm/{id}', [PendukungSktmController::class, 'update'])->middleware('role:user|make');
        Route::delete('supSktm/{id}', [PendukungSktmController::class, 'destroy'])->middleware('role:user|make');
        Route::get('/users', [UsersController::class, 'index'])->middleware('role:user|make');
        Route::put('/users/{user}', [UsersController::class, 'update'])->middleware('role:user|make');
        Route::get('/schedules', [JadwalController::class, 'index'])->middleware('role:user|make');
        Route::post('/schedules/post', [JadwalController::class, 'store'])->middleware('role:user|make');
        Route::get('/schedules/{id}', [JadwalController::class, 'show'])->middleware('role:user|make');

        Route::get('/submission', [PengajuanController::class, 'index'])->middleware('role:user|make');
        Route::post('/submission/post', [PengajuanController::class, 'store'])->middleware('role:user|make');
        Route::get('/submission/{id}', [PengajuanController::class, 'show'])->middleware('role:user|make');

        Route::get('/document', [DokumenController::class, 'index'])->middleware('role:user|make');
        Route::post('/document/post', [DokumenController::class, 'store'])->middleware('role:user|make');
    });
});
