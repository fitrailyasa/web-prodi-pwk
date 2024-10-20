<?php

use App\Http\Controllers\guest\BeritaController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'name' => 'Laravel'
    ]);
})->name('beranda');

Route::get('/about', function () {
    return Inertia::render('About', [
        'name' => 'test'
    ]);
})->name('about');

Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
