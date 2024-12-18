<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EditProfileController;
use App\Http\Controllers\Admin\StatistikController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Civil\DashboardController as CivilDashboardController;
use App\Http\Controllers\Civil\DomisiliController;
use App\Http\Controllers\Civil\IjinUsahaController;
use App\Http\Controllers\Civil\ScheduleController;
use App\Http\Controllers\Civil\SKCKController;
use App\Http\Controllers\Civil\SKTMController;
use App\Http\Controllers\Civil\TrackingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DokumenController;
use App\Http\Controllers\Super\ActivityController;
use App\Http\Controllers\Super\DashboardController as SuperDashboardController;
use Illuminate\Http\Request;

//Login
Route::get('/', function () {
    return view('auth.login');
});



Route::middleware('auth')->group(function(){

    Route::get('/dashboard', function (Request $request) {
        $user = $request->user();

        if ($user->hasRole('super_admin')) {
            return redirect()->route('superadmindashboard');
        } else if ($user->hasRole('admin')) {
            return redirect()->route('admindashboard');
        } else if ($user->hasRole('user')) {
            return redirect()->route('civil.index');
        }
    })->name('dashboard');

    Route::get('/admin', [DashboardController::class, 'index'])->name('admindashboard');
    Route::get('/super', [SuperDashboardController::class, 'index'])->name('superadmindashboard');
    Route::get('/civil', [CivilDashboardController::class, 'index'])->name('civil.index');
});



//Admin, nanti pake yang middleware

Route::get('/admin/profile', [EditProfileController::class, 'create'])->name('profile.create');
Route::get('/admin/statistic', [StatistikController::class, 'index'])->name('statistic.index');

//Super Admin, nanti pake yang middleware

Route::get('/super/activity', [ActivityController::class, 'index'])->name('activity.index');
Route::post('/super/add', [SuperDashboardController::class, 'store'])->name('superadmin.store');

//Civil, nanti pake yang middleware
Route::get('/civil/tracking', [TrackingController::class, 'index'])->name('civil.tracking');
Route::get('/civil/schedule', [ScheduleController::class, 'index'])->name('civil.schedule');
Route::get('/civil/skck', [SKCKController::class, 'store'])->name('skck.store');
Route::get('/civil/domisili', [DomisiliController::class, 'store'])->name('domisili.store');
Route::get('/civil/sktm', [SKTMController::class, 'createSelfData'])->name('sktm.selfdata');
Route::get('/civil/sktm1', [SKTMController::class, 'createFamilyData'])->name('sktm.familydata');
Route::get('/civil/sktm2', [SKTMController::class, 'createUsage'])->name('sktm.usage');
Route::get('/civil/usaha', [IjinUsahaController::class, 'createSelfData'])->name('usaha.selfdata');
Route::get('/civil/usaha1', [IjinUsahaController::class, 'createBusinessData'])->name('usaha.businessdata');

// Route::get('/dashboard', function (Request $request) {
//     $user = $request->user();

//     if ($user->hasRole('super_admin')) {
//         return redirect()->route('superadmin.index');
//     }

//     if ($user->hasRole('admin')) {
//         return redirect()->route('admin.index');
//     }

//     if ($user->hasRole('user')) {
//         return redirect()->route('civil.index');
//     }

// })->middleware('auth:sanctum')->name('dashboard');

// // Route untuk Super Admin, hanya dapat diakses oleh superadmin
//     Route::middleware(['role:super_admin'])->group(function () {
//     Route::get('/super', [SuperDashboardController::class, 'index'])->name('superadmin.index');
//     Route::post('/super/add', [SuperDashboardController::class, 'store'])->name('superadmin.store');
//     Route::get('/super/activity', [ActivityController::class, 'index'])->name('activity.index');
// });

// // Route untuk Admin, hanya dapat diakses oleh admin
// Route::middleware(['role:admin'])->group(function () {
//     Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index');
//     Route::get('/admin/profile', [EditProfileController::class, 'create'])->name('profile.create');
//     Route::get('/admin/statistic', [StatistikController::class, 'index'])->name('statistic.index');
// });

// // Route untuk Civil (Warga)
// Route::middleware(['role:civil'])->group(function () {
//     Route::get('/civil', [CivilDashboardController::class, 'index'])->name('civil.index');
//     Route::get('/civil/skck', [SKCKController::class, 'store'])->name('skck.store');
//     Route::get('/civil/domisili', [DomisiliController::class, 'store'])->name('domisili.store');
//     Route::get('/civil/sktm', [SKTMController::class, 'createSelfData'])->name('sktm.selfdata');
//     Route::get('/civil/sktm1', [SKTMController::class, 'createFamilyData'])->name('sktm.familydata');
//     Route::get('/civil/sktm2', [SKTMController::class, 'createUsage'])->name('sktm.usage');
//     Route::get('/civil/usaha', [IjinUsahaController::class, 'createSelfData'])->name('usaha.selfdata');
//     Route::get('/civil/usaha1', [IjinUsahaController::class, 'createBusinessData'])->name('usaha.businessdata');
// });



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// //Autentikasi
// Route::middleware('auth')->group(function () {
//     //Dashboard untuk Admin
//     Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index');

//     // Dashboard untuk Super Admin
//     Route::get('/super', [SuperDashboardController::class, 'index'])->name('superadmin.index');

//     // Dashboard untuk Warga
//     Route::get('/civil', [CivilDashboardController::class, 'index'])->name('civil.index');
// });

// Route::post('/dokumen', [DokumenController::class, 'store']);



require __DIR__.'/auth.php';









