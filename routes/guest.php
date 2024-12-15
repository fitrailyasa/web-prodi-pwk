<?php

use App\Http\Controllers\guest\BeritaController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', function () {
    return Inertia::render('Home', [
        'name' => 'test'
    ]);
})->name('home');

Route::get('/about', function () {
    return Inertia::render('About', [
        'name' => 'test'
    ]);
})->name('about');


// akadmik
Route::get('/kalender-akademik', function () {
    return Inertia::render('Akademik/KalenderAkademik', [
        'name' => 'test'
    ]);
})->name('kalender-akademik');

Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
