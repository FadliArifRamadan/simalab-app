<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KoorlabController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\PrintedDocumentController;
use App\Http\Controllers\ActivitySubmissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login & Logout Pengunjung lab
Route::get('/', [AuthController::class, 'loginpengunjung'])->name('login');
Route::post('/', [AuthController::class, 'authenticatepengunjung']);
Route::get('/logout', [AuthController::class, 'logoutpengunjung']);

// Register Pengunjung Lab
Route::get('/register/register-pengunjung', [AuthController::class, 'registerpengunjung']);
Route::post('/register/register-pengunjung', [AuthController::class, 'storeregisterpengunjung']);

// Login & Logout Kepala lab
Route::get('/kepala-lab/login', [AuthController::class, 'loginkalab']);
Route::post('/kepala-lab/login', [AuthController::class, 'authenticatekalab']);
Route::get('/kepala-lab/logout', [AuthController::class, 'logoutkalab']);

// Login & Logout Koor lab
Route::get('/koor-lab/login', [AuthController::class, 'loginkoorlab']);
Route::post('/koor-lab/login', [AuthController::class, 'authenticatekoorlab']);
Route::get('/koor-lab/logout', [AuthController::class, 'logoutkoorlab']);

// Role Kepala Lab (roles_id = 1)
Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/kepala-lab/dashboard', [dashboardController::class, 'kepalalab']);
    Route::get('/kepala-lab/jenis-kegiatan-lab', [ActivityController::class, 'index']);
    Route::get('/kepala-lab/jenis-kegiatan-lab-add', [ActivityController::class, 'create']);
    Route::post('/kepala-lab/jenis-kegiatan-lab-add', [ActivityController::class, 'store']);
    Route::get('/kepala-lab/jenis-kegiatan-lab-edit/{id}', [ActivityController::class, 'edit']);
    Route::put('/kepala-lab/jenis-kegiatan-lab-update/{id}', [ActivityController::class, 'update']);
    Route::delete('/kepala-lab/jenis-kegiatan-lab-delete/{id}', [ActivityController::class, 'destroy']);

    Route::get('/kepala-lab/jenis-lab', [LabController::class, 'index']);
    Route::get('/kepala-lab/jenis-lab-add', [LabController::class, 'create']);
    Route::post('/kepala-lab/jenis-lab-add', [LabController::class, 'store']);
    Route::get('/kepala-lab/jenis-lab-edit/{id}', [LabController::class, 'edit']);
    Route::put('/kepala-lab/jenis-lab-update/{id}', [LabController::class, 'update']);
    Route::delete('/kepala-lab/jenis-lab-delete/{id}', [LabController::class, 'destroy']);

    Route::get('/kepala-lab/koor-lab', [UserController::class, 'kepalalab']);
    Route::get('/kepala-lab/koor-lab-add', [UserController::class, 'create']);
    Route::post('/kepala-lab/koor-lab-add', [UserController::class, 'store']);
    Route::get('/kepala-lab/koor-lab-edit/{id}', [UserController::class, 'edit']);
    Route::put('/kepala-lab/koor-lab-update/{id}', [UserController::class, 'update']);
    Route::delete('/kepala-lab/koor-lab-delete/{id}', [UserController::class, 'destroy']);

    Route::get('/kepala-lab/jenis-dokumen-lab', [DocumentController::class, 'index']);
    Route::get('/kepala-lab/jenis-dokumen-lab-add', [DocumentController::class, 'create']);
    Route::post('/kepala-lab/jenis-dokumen-lab-add', [DocumentController::class, 'store']);
    Route::get('/kepala-lab/jenis-dokumen-lab-edit/{id}', [DocumentController::class, 'edit']);
    Route::put('/kepala-lab/jenis-dokumen-lab-update/{id}', [DocumentController::class, 'update']);
    Route::delete('/kepala-lab/jenis-dokumen-lab-delete/{id}', [DocumentController::class, 'destroy']);
    
    Route::get('/kepala-lab/dokumen-lab', [DocController::class, 'kepalalab']);
    Route::get('/kepala-lab/dokumen-lab/download/{id}', [DocController::class, 'downloadKalab'])->name('docs.downloadKalab');
    Route::get('/kepala-lab/dokumen-lab-detail/{id}', [DocController::class, 'showDetail'])->name('docs.detail');
    Route::get('/kepala-lab/pengajuan-kegiatan', [ActivitySubmissionController::class, 'kepalalab']);

    Route::get('/kepala-lab/profile', [UserProfileController::class, 'indexKalab']);
    Route::post('/kepala-lab/profile/{id}', [UserProfileController::class, 'updateKalab']);
});

// Role Koordinator Lab (roles_id = 2)
Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/koordinator-lab/dashboard', [dashboardController::class, 'koorlab']);
    Route::get('/koordinator-lab/dokumen-lab', [DocController::class, 'koorlab']);
    Route::get('/koordinator-lab/dokumen-lab-add', [DocController::class, 'create']);
    Route::get('/koordinator-lab/dokumen-lab-add/{submission_id}', [DocController::class, 'createDoc']);
    Route::post('/koordinator-lab/dokumen-lab-add', [DocController::class, 'store']);
    Route::get('/koordinator-lab/dokumen-lab-edit/{id}', [DocController::class, 'edit']);
    Route::put('/koordinator-lab/dokumen-lab-update/{id}', [DocController::class, 'update']);
    Route::delete('/koordinator-lab/dokumen-lab-delete/{id}', [DocController::class, 'destroy']);

    Route::post('/koordinator-lab/dokumen-lab-temp-save', [DocController::class, 'tempSave'])->name('docs.tempSave');
    Route::post('/koordinator-lab/dokumen-lab-temp-upload', [DocController::class, 'tempUpload'])->name('docs.tempUpload');
    Route::get('/koordinator-lab/dokumen-lab/temp', [DocController::class, 'showTemp'])->name('docs.temp');
    Route::get('/koordinator-lab/dokumen-lab-detail/{id}', [DocController::class, 'show'])->name('docs.show');

    Route::get('/koordinator-lab/pengajuan-kegiatan', [ActivitySubmissionController::class, 'koorlab']);
    Route::get('/koordinator-lab/pengajuan-kegiatan-edit/{id}', [ActivitySubmissionController::class, 'editKoorlab']);
    Route::put('/koordinator-lab/pengajuan-kegiatan-update/{id}', [ActivitySubmissionController::class, 'updateKoorlab']);
    // Route untuk menangani approval pengajuan kegiatan
    Route::get('/koordinator-lab/pengajuan-kegiatan/{id}/approve', [ActivitySubmissionController::class, 'approve'])->name('koorlab.approve');
    // Route untuk menangani rejection pengajuan kegiatan
    Route::get('/koordinator-lab/pengajuan-kegiatan/{id}/reject', [ActivitySubmissionController::class, 'reject'])->name('koorlab.reject');
    // Route untuk menangani On Progress pengajuan kegiatan
    Route::get('/koordinator-lab/pengajuan-kegiatan/{id}/progress', [ActivitySubmissionController::class, 'progress'])->name('koorlab.progress');
    // Route untuk menangani Done pengajuan kegiatan
    Route::get('/koordinator-lab/pengajuan-kegiatan/{id}/done', [ActivitySubmissionController::class, 'done'])->name('koorlab.done');

    Route::get('/koordinator-lab/daftar-pengunjung', [UserController::class, 'koorlab']);
    // Route::get('/koordinator-lab/lihat-daftar-pengunjung/{user_id}', [DocController::class, 'lihatDaftar']);
    Route::get('/koordinator-lab/lihat-dokumen/{visitors_id}', [DocController::class, 'lihatDaftar']);

    Route::get('/koordinator-lab/profile', [UserProfileController::class, 'indexKoorlab']);
    Route::post('/koordinator-lab/profile/{id}', [UserProfileController::class, 'updateKoorlab']);

    
});

// Role Pengunjung Lab (roles_id = 3)
Route::middleware(['auth', 'role:3'])->group(function () {
    Route::get('/pengunjung-lab/dashboard', [dashboardController::class, 'pengunjunglab']);
    Route::get('/pengunjung-lab/profile', [UserProfileController::class, 'index']);
    Route::post('/pengunjung-lab/profile/{id}', [UserProfileController::class, 'update']);
    // Routes untuk mengajukan kegiatan
    Route::get('/pengunjung-lab/pengajuan-kegiatan', [ActivitySubmissionController::class, 'pengunjung']);
    Route::get('/pengunjung-lab/pengajuan-kegiatan-add', [ActivitySubmissionController::class, 'create']);
    Route::post('/pengunjung-lab/pengajuan-kegiatan-add', [ActivitySubmissionController::class, 'store']);
    Route::get('/pengunjung-lab/pengajuan-kegiatan-edit/{id}', [ActivitySubmissionController::class, 'edit']);
    Route::put('/pengunjung-lab/pengajuan-kegiatan-update/{id}', [ActivitySubmissionController::class, 'update']);
    Route::delete('/pengunjung-lab/pengajuan-kegiatan-delete/{id}', [ActivitySubmissionController::class, 'destroy']);
    Route::get('/get-activities-by-coordinator', [ActivitySubmissionController::class, 'getActivitiesByCoordinator']);
    Route::get('/get-available-times-by-coordinator', [ActivitySubmissionController::class, 'getAvailableTimesByCoordinator']);

    Route::get('/pengunjung-lab/dokumen-lab', [DocController::class, 'pengunjung']);
    Route::get('/pengunjung-lab/dokumen-lab/download/{id}', [DocController::class, 'downloadPengunjung'])->name('docs.download');
    Route::get('/pengunjung-lab/dokumen-lab-detail/{id}', [DocController::class, 'showDetails'])->name('docs.details');

});