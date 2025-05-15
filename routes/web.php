<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Dosen;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminAlumniController;
use App\Http\Controllers\Admin\AdminBeritaController;
use App\Http\Controllers\Admin\AdminJadwalController;
use App\Http\Controllers\Admin\AdminLinkController;
use App\Http\Controllers\Admin\AdminMatkulController;
use App\Http\Controllers\Admin\AdminMedpartController;
use App\Http\Controllers\Admin\AdminTentangController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\AdminKalenderController;
use App\Http\Controllers\Admin\AdminModulController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminTagController;
use App\Http\Controllers\Admin\AdminMbkmController;
use App\Http\Controllers\Auth\ProviderController;

use App\Http\Controllers\NavbarController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\Admin\AdminChatbotController;

Route::get('/navbar', [NavbarController::class, 'index'])->name('navbar');

// Chatbot route - outside auth middleware
Route::post('/chatbot/response', [ChatbotController::class, 'getResponse'])->name('chatbot.response')->middleware('web');

// OAuth
Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect'])->name('auth.redirect');
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback'])->name('auth.callback');

require __DIR__ . '/auth.php';
require __DIR__ . '/guest.php';

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CMS ADMINITRASTOR
    Route::middleware([Admin::class])->name('admin.')->prefix('admin')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('beranda');
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // CRUD USER
        Route::resource('user', AdminUserController::class)->only(['index', 'store', 'update', 'destroy']);

        // CRUD ALUMNI
        Route::get('/alumni', [AdminAlumniController::class, 'index'])->name('alumni.index');
        Route::post('/alumni', [AdminAlumniController::class, 'store'])->name('alumni.store');
        Route::put('/alumni/{id}/update', [AdminAlumniController::class, 'update'])->name('alumni.update');
        Route::delete('/alumni/{id}/destroy', [AdminAlumniController::class, 'destroy'])->name('alumni.destroy');
        Route::post('/alumni/import', [AdminAlumniController::class, 'import'])->name('alumni.import');
        Route::get('/alumni/export', [AdminAlumniController::class, 'export'])->name('alumni.export');
        Route::delete('/alumni/deleteAll', [AdminAlumniController::class, 'destroyAll'])->name('alumni.destroyAll');

        // CRUD BERITA
        Route::get('/berita', [AdminBeritaController::class, 'index'])->name('berita.index');
        Route::post('/berita', [AdminBeritaController::class, 'store'])->name('berita.store');
        Route::put('/berita/{id}/update', [AdminBeritaController::class, 'update'])->name('berita.update');
        Route::delete('/berita/{id}/destroy', [AdminBeritaController::class, 'destroy'])->name('berita.destroy');
        Route::post('/berita/import', [AdminBeritaController::class, 'import'])->name('berita.import');
        Route::get('/berita/export', [AdminBeritaController::class, 'export'])->name('berita.export');
        Route::delete('/berita/deleteAll', [AdminBeritaController::class, 'destroyAll'])->name('berita.destroyAll');
        Route::post('/admin/berita/upload-image', [AdminBeritaController::class, 'uploadImage'])->name('berita.upload_image');

        // CRUD JADWAL
        Route::get('/jadwal', [AdminJadwalController::class, 'index'])->name('jadwal.index');
        Route::post('/jadwal', [AdminJadwalController::class, 'store'])->name('jadwal.store');
        Route::put('/jadwal/{id}/update', [AdminJadwalController::class, 'update'])->name('jadwal.update');
        Route::delete('/jadwal/{id}/destroy', [AdminJadwalController::class, 'destroy'])->name('jadwal.destroy');
        Route::post('/jadwal/import', [AdminJadwalController::class, 'import'])->name('jadwal.import');
        Route::get('/jadwal/export', [AdminJadwalController::class, 'export'])->name('jadwal.export');
        Route::delete('/jadwal/deleteAll', [AdminJadwalController::class, 'destroyAll'])->name('jadwal.destroyAll');

        // CRUD EVENT
        Route::get('/event', [AdminEventController::class, 'index'])->name('event.index');
        Route::post('/event', [AdminEventController::class, 'store'])->name('event.store');
        Route::put('/event/{id}/update', [AdminEventController::class, 'update'])->name('event.update');
        Route::delete('/event/{id}/destroy', [AdminEventController::class, 'destroy'])->name('event.destroy');
        Route::post('/event/import', [AdminEventController::class, 'import'])->name('event.import');
        Route::get('/event/export', [AdminEventController::class, 'export'])->name('event.export');
        Route::delete('/event/deleteAll', [AdminEventController::class, 'destroyAll'])->name('event.destroyAll');
        Route::post('/admin/event/upload-image', [AdminEventController::class, 'uploadImage'])->name('event.upload_image');

        // CRUD LINK
        Route::get('/link', [AdminLinkController::class, 'index'])->name('link.index');
        Route::post('/link', [AdminLinkController::class, 'store'])->name('link.store');
        Route::put('/link/{id}/update', [AdminLinkController::class, 'update'])->name('link.update');
        Route::delete('/link/{id}/destroy', [AdminLinkController::class, 'destroy'])->name('link.destroy');
        Route::post('/link/import', [AdminLinkController::class, 'import'])->name('link.import');
        Route::get('/link/export', [AdminLinkController::class, 'export'])->name('link.export');
        Route::delete('/link/deleteAll', [AdminLinkController::class, 'destroyAll'])->name('link.destroyAll');

        // CRUD MATA KULIAH
        Route::get('/matkul', [AdminMatkulController::class, 'index'])->name('matkul.index');
        Route::post('/matkul', [AdminMatkulController::class, 'store'])->name('matkul.store');
        Route::put('/matkul/{id}/update', [AdminMatkulController::class, 'update'])->name('matkul.update');
        Route::delete('/matkul/{id}/destroy', [AdminMatkulController::class, 'destroy'])->name('matkul.destroy');
        Route::post('/matkul/import', [AdminMatkulController::class, 'import'])->name('matkul.import');
        Route::get('/matkul/export', [AdminMatkulController::class, 'export'])->name('matkul.export');
        Route::delete('/matkul/deleteAll', [AdminMatkulController::class, 'destroyAll'])->name('matkul.destroyAll');

        // CRUD MODUL KULIAH
        Route::get('/modul', [AdminModulController::class, 'index'])->name('modul.index');
        Route::post('/modul', [AdminModulController::class, 'store'])->name('modul.store');
        Route::put('/modul/{id}/update', [AdminModulController::class, 'update'])->name('modul.update');
        Route::delete('/modul/{id}/destroy', [AdminModulController::class, 'destroy'])->name('modul.destroy');

        // CRUD MEDIA PARTNER
        Route::get('/medpart', [AdminMedpartController::class, 'index'])->name('medpart.index');
        Route::post('/medpart', [AdminMedpartController::class, 'store'])->name('medpart.store');
        Route::put('/medpart/{id}/update', [AdminMedpartController::class, 'update'])->name('medpart.update');
        Route::delete('/medpart/{id}/destroy', [AdminMedpartController::class, 'destroy'])->name('medpart.destroy');
        Route::post('/medpart/import', [AdminMedpartController::class, 'import'])->name('medpart.import');
        Route::get('/medpart/export', [AdminMedpartController::class, 'export'])->name('medpart.export');
        Route::delete('/medpart/deleteAll', [AdminMedpartController::class, 'destroyAll'])->name('medpart.destroyAll');

        // CRUD TAG
        Route::get('/tag', [AdminTagController::class, 'index'])->name('tag.index');
        Route::post('/tag', [AdminTagController::class, 'store'])->name('tag.store');
        Route::put('/tag/{id}/update', [AdminTagController::class, 'update'])->name('tag.update');
        Route::delete('/tag/{id}/destroy', [AdminTagController::class, 'destroy'])->name('tag.destroy');
        Route::post('/tag/import', [AdminTagController::class, 'import'])->name('tag.import');
        Route::get('/tag/export', [AdminTagController::class, 'export'])->name('tag.export');
        Route::delete('/tag/deleteAll', [AdminTagController::class, 'destroyAll'])->name('tag.destroyAll');

        // CRUD TENTANG
        Route::get('/tentang', [AdminTentangController::class, 'index'])->name('tentang.index');
        Route::put('/tentang/{id}/update', [AdminTentangController::class, 'update'])->name('tentang.update');
        Route::post('/admin/tentang/upload-image', [AdminTentangController::class, 'uploadImage'])->name('tentang.upload_image');

        Route::get('/kalender', [AdminKalenderController::class, 'index'])->name('kalender.index');
        Route::put('/kalender/{id}/update', [AdminKalenderController::class, 'update'])->name('kalender.update');

        // CRUD CHATBOT
        Route::get('/chatbot', [AdminChatbotController::class, 'index'])->name('chatbot.index');
        Route::get('/chatbot/{id}', [AdminChatbotController::class, 'show'])->name('chatbot.show');
        Route::post('/chatbot', [AdminChatbotController::class, 'store'])->name('chatbot.store');
        Route::put('/chatbot/{id}/update', [AdminChatbotController::class, 'update'])->name('chatbot.update');
        Route::delete('/chatbot/{id}/destroy', [AdminChatbotController::class, 'destroy'])->name('chatbot.destroy');
        Route::delete('/chatbot/deleteAll', [AdminChatbotController::class, 'destroyAll'])->name('chatbot.destroyAll');

        // CRUD MBKM
        Route::get('/mbkm', [AdminMbkmController::class, 'index'])->name('mbkm.index');
        Route::get('/mbkm/{id}', [AdminMbkmController::class, 'show'])->name('mbkm.show');
        Route::post('/mbkm', [AdminMbkmController::class, 'store'])->name('mbkm.store');
        Route::put('/mbkm/{id}/update', [AdminMbkmController::class, 'update'])->name('mbkm.update');
        Route::delete('/mbkm/{id}/destroy', [AdminMbkmController::class, 'destroy'])->name('mbkm.destroy');
        Route::delete('/mbkm/deleteAll', [AdminMbkmController::class, 'destroyAll'])->name('mbkm.destroyAll');
    });

    // CMS DOSEN
    Route::middleware([Dosen::class])->name('dosen.')->prefix('dosen')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('beranda');
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Profile Management
        Route::get('/profile', [App\Http\Controllers\Dosen\DosenProfileController::class, 'index'])->name('profile.index');
        Route::put('/profile', [App\Http\Controllers\Dosen\DosenProfileController::class, 'update'])->name('profile.update');

        // CRUD JADWAL
        Route::get('/jadwal', [AdminJadwalController::class, 'index'])->name('jadwal.index');
        Route::post('/jadwal', [AdminJadwalController::class, 'store'])->name('jadwal.store');
        Route::put('/jadwal/{id}/update', [AdminJadwalController::class, 'update'])->name('jadwal.update');
        Route::delete('/jadwal/{id}/destroy', [AdminJadwalController::class, 'destroy'])->name('jadwal.destroy');
        Route::post('/jadwal/import', [AdminJadwalController::class, 'import'])->name('jadwal.import');
        Route::get('/jadwal/export', [AdminJadwalController::class, 'export'])->name('jadwal.export');
        Route::delete('/jadwal/deleteAll', [AdminJadwalController::class, 'destroyAll'])->name('jadwal.destroyAll');

        // CRUD MATA KULIAH
        Route::get('/matkul', [AdminMatkulController::class, 'index'])->name('matkul.index');
        Route::post('/matkul', [AdminMatkulController::class, 'store'])->name('matkul.store');
        Route::put('/matkul/{id}/update', [AdminMatkulController::class, 'update'])->name('matkul.update');
        Route::delete('/matkul/{id}/destroy', [AdminMatkulController::class, 'destroy'])->name('matkul.destroy');
        Route::post('/matkul/import', [AdminMatkulController::class, 'import'])->name('matkul.import');
        Route::get('/matkul/export', [AdminMatkulController::class, 'export'])->name('matkul.export');
        Route::delete('/matkul/deleteAll', [AdminMatkulController::class, 'destroyAll'])->name('matkul.destroyAll');
    });
});
