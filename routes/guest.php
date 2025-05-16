<?php

use App\Http\Controllers\API\VisitorController;
use App\Http\Controllers\guest\HomeController;
use App\Http\Controllers\guest\VisiMisiController;
use App\Http\Controllers\guest\SejarahController;
use App\Http\Controllers\guest\DosenController;
use App\Http\Controllers\guest\KelompokKeahlianController;
use App\Http\Controllers\guest\AlumniController;
use App\Http\Controllers\guest\KurikulumController;
use App\Http\Controllers\guest\KalenderAkademikController;
use App\Http\Controllers\guest\MbkmController;
use App\Http\Controllers\guest\BeritaController;
use App\Http\Controllers\guest\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Akademik routes
Route::group(['prefix' => 'akademik', 'as' => 'akademik.'], function () {
    Route::get('/kalender-akademik', [KalenderAkademikController::class, 'index'])->name('kalender-akademik');
    Route::get('/kurikulum', [KurikulumController::class, 'index'])->name('kurikulum');
    Route::get('/mbkm', [MbkmController::class, 'index'])->name('mbkm');
});

// Profile routes
Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
    Route::get('/visi-misi', [VisiMisiController::class, 'index'])->name('visi-misi');
    Route::get('/sejarah', [SejarahController::class, 'index'])->name('sejarah');
    Route::get('/dosen-and-staf', [DosenController::class, 'index'])->name('dosen-and-staf');
    Route::get('/dosen-and-staf/{id}', [DosenController::class, 'show'])->name('dosen-and-staf.detail');
    Route::get('/kelompok-keahlian', [KelompokKeahlianController::class, 'index'])->name('kelompok-keahlian');
    Route::get('/alumni', [AlumniController::class, 'index'])->name('alumni');
});

// Berita routes
Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

// Contact routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::group(['prefix' => 'api', 'as' => 'api.'], function () {
    Route::post('/post-visitor', [VisitorController::class, 'store'])->name('visitor.store');
    Route::get('/count-visitor', [VisitorController::class, 'count'])->name('visitor.count');
});
