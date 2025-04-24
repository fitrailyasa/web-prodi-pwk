<?php

use App\Http\Controllers\guest\AlumniController;
use App\Http\Controllers\guest\BeritaController;
use App\Http\Controllers\guest\HomeController;
use App\Http\Controllers\guest\ContactController;
use App\Http\Controllers\guest\DosenController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Redirect root to home
Route::get('/', function () {
    return redirect()->route('home');
});

// Main pages
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', function () {
    return Inertia::render('About', [
        'name' => 'test'
    ]);
})->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Akademik routes
Route::group(['prefix' => 'akademik', 'as' => 'akademik.'], function () {
    Route::get('/kalender-akademik', function () {
        return Inertia::render('Akademik/KalenderAkademik', [
            'name' => 'test'
        ]);
    })->name('kalender-akademik');
});

// Profile routes
Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
    Route::get('/dosen-and-staf', [DosenController::class, 'index'])->name('dosen-and-staf');
    Route::get('/dosen-and-staf/{id}', [DosenController::class, 'show'])->name('dosen-and-staf.detail');
    Route::get('/trace-study', [AlumniController::class, 'index'])->name('alumni');
});

// Berita routes
Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
