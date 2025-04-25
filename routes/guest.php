<?php

use App\Http\Controllers\guest\AlumniController;
use App\Http\Controllers\guest\BeritaController;
use App\Http\Controllers\guest\HomeController;
use App\Http\Controllers\guest\ContactController;
use App\Http\Controllers\guest\DosenController;
use App\Http\Controllers\guest\KurikulumController;
use App\Http\Controllers\guest\MbkmController;
use App\Http\Controllers\guest\KelompokKeahlianController;
use App\Http\Controllers\guest\SejarahController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Redirect root to home
Route::get('/', function () {
    return redirect()->route('home');
});

// Main pages
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Akademik routes
Route::group(['prefix' => 'akademik', 'as' => 'akademik.'], function () {
    Route::get('/kalender-akademik', function () {
        return Inertia::render('Akademik/KalenderAkademik', [
            'name' => 'test'
        ]);
    })->name('kalender-akademik');
    Route::get('/kurikulum', [KurikulumController::class, 'index'])->name('kurikulum');
    Route::get('/mbkm', [MbkmController::class, 'index'])->name('mbkm');
});

// Profile routes
Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
    Route::get('/dosen-and-staf', function () {
        return Inertia::render('Profile/DosenAndStaf/DosenAndStaft', [
            'name' => 'test'
        ]);
    })->name('dosen-and-staf');
    Route::get('/dosen-and-staf/{id}', function () {
        return Inertia::render('Profile/DosenAndStaf/DosenAndStafDetail', [
            'name' => 'test'
        ]);
    })->name('dosen-and-staf.detail');
    Route::get('/trace-study', [AlumniController::class, 'index'])->name('alumni');

    // New profile pages
    Route::get('/visi-misi', function () {
        return Inertia::render('Profile/VisiMisi');
    })->name('visi-misi');

    Route::get('/sejarah', [SejarahController::class, 'index'])->name('sejarah');

    Route::get('/kelompok-keahlian', [KelompokKeahlianController::class, 'index'])->name('kelompok-keahlian');
});

// Berita routes
Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
