<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EditProfileController;
use App\Http\Controllers\Admin\StatistikController;
use App\Http\Controllers\Civil\DashboardController as CivilDashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DokumenController;
use App\Http\Controllers\Super\DashboardController as SuperDashboardController;
//Login
Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('admin.super.dashboard');
})->middleware(['auth', 'verified'])->name('admin.super.dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

//Autentikasi
Route::middleware('auth')->group(function () {
    //Dashboard untuk Admin
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin');

    // Dashboard untuk Super Admin
    Route::get('/super', [SuperDashboardController::class, 'index'])->name('superadmin');

    // Dashboard untuk Warga
    Route::get('/civil', [CivilDashboardController::class, 'index'])->name('civil');
});

Route::post('/dokumen', [DokumenController::class, 'store']);
//Admin

Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index');
Route::get('/profile', [EditProfileController::class, 'create'])->name('profile.create');
Route::get('/statistic', [StatistikController::class, 'index'])->name('statistic.index');
Route::get('/skck', function () {
    return view('civil.form.skck');
});
Route::get('/super', function () {
    return view('admin.super.dashboard');
});


Route::get('/activity', function () {
    return view('admin.super.activity');
});
Route::get('/civil', function () {
    return view('civil.dashboard');
});
Route::get('/domisili', function () {
    return view('civil.form.domisili');
});
Route::get('/sktm', function () {
    return view('civil.form.sktm.selfdata');
});
Route::get('/sktm1', function () {
    return view('civil.form.sktm.familydata');
});
Route::get('/sktm2', function () {
    return view('civil.form.sktm.usage');
});
Route::get('/usaha', function () {
    return view('civil.form.usaha.selfdata');
});
Route::get('/usaha1', function () {
    return view('civil.form.usaha.businessdata');
});
require __DIR__.'/auth.php';

