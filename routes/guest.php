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


Route::group(['prefix' => 'akademik', 'as' => 'akademik.'], function () {
    Route::get('/kalender-akademik', function () {
        return Inertia::render('Akademik/KalenderAkademik', [
            'name' => 'test'
        ]);
    })->name('kalender-akademik');
});

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

    Route::get('/trace-study', function () {
        return Inertia::render('Profile/Alumni', [
            'name' => 'test'
        ]);
    })->name('alumni');
});


// berita

Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
