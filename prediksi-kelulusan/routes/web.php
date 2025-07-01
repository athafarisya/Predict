<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\adminController;
use App\Http\Controllers\Admin\DataMahasiswaController;
use App\Http\Controllers\Admin\SolusiController;
use App\Http\Controllers\Mahasiswa\PrediksiController;
use App\Http\Controllers\Admin\CatatanController;
use App\Http\Controllers\Admin\DataUserController;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

// Route untuk halaman login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Route untuk menghandle login action
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Route untuk dashboard admin
Route::middleware([])->group(function(){
    Route::get('/admin/dashboard', [adminController::class, 'index'])->name('admin.dashboard');

    // Data Mahasiswa
    Route::get('/data-mahasiswa', [DataMahasiswaController::class, 'index'])->name('data-mahasiswa');
    Route::post('/data-mahasiswa/save', [DataMahasiswaController::class, 'saveMahasiswa'])->name('dataMahasiswa.save');
    Route::delete('/data-mahasiswa/delete/{id}', [DataMahasiswaController::class, 'deleteMahasiswa'])->name('dataMahasiswa.delete');

    Route::get('/data-mahasiswa/export', [DataMahasiswaController::class, 'exportMahasiswa'])->name('dataMahasiswa.export');
    Route::post('/data-mahasiswa/import', [DataMahasiswaController::class, 'importMahasiswa'])->name('dataMahasiswa.import');
    Route::get('/data-mahasiswa/template', [DataMahasiswaController::class, 'downloadTemplate'])->name('dataMahasiswa.template');

    Route::get('/data-mahasiswa/predict-all', [DataMahasiswaController::class, 'predictAll'])->name('dataMahasiswa.predictAll');

    Route::get('/hasil/{nim}', [PrediksiController::class, 'viewPrediction'])->name('viewPrediction');

    // Data User
    Route::get('/data-user', [DataUserController::class, 'index'])->name('data-user');
    Route::post('/data-user/save', [DataUserController::class, 'saveUser'])->name('dataUser.save');
    Route::delete('/data-user/delete/{id}', [DataUserController::class, 'deleteUser'])->name('dataUser.delete');
    Route::post('/data-user/import', [DataUserController::class, 'importUser'])->name('dataUser.import');
    Route::get('/data-user/template', [DataUserController::class, 'downloadTemplate'])->name('dataUser.template');

    // Solusi Keluusan
    Route::get('solusi', [SolusiController::class, 'index'])->name('solusi.index');
    Route::get('solusi/data', [SolusiController::class, 'servesideTable'])->name('solusi.data');
    Route::post('solusi', [SolusiController::class, 'store'])->name('solusi.store');
    Route::get('solusi/{id}', [SolusiController::class, 'show'])->name('solusi.show');
    Route::put('solusi/{id}', [SolusiController::class, 'update'])->name('solusi.update');
    Route::delete('solusi/{id}', [SolusiController::class, 'destroy'])->name('solusi.destroy');

    // Data Prediksi Kelulusan
    Route::get('/admin/catatan', [CatatanController::class, 'index'])->name('catatan.index');

});

Route::middleware([])->group(function () {

    //prediksi
    Route::get('/prediksi', [PrediksiController::class, 'index'])->name('prediksi');
    Route::post('/prediksi/hasil', [PrediksiController::class, 'predict'])->name('prediksi.predict');
    Route::get('/hasil/{nim}', [PrediksiController::class, 'viewPrediction'])->name('viewPrediction');

    //catatan
    Route::post('/catatan/store', [CatatanController::class, 'store'])->name('catatan.store');

});
