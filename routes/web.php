<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminAlumniController;
use App\Http\Controllers\Admin\AdminBeritaController;
use App\Http\Controllers\Admin\AdminJadwalController;
use App\Http\Controllers\Admin\AdminKategoriController;
use App\Http\Controllers\Admin\AdminLayananController;
use App\Http\Controllers\Admin\AdminLinkController;
use App\Http\Controllers\Admin\AdminMatkulController;
use App\Http\Controllers\Admin\AdminMedpartController;
use App\Http\Controllers\Admin\AdminStaffController;
use App\Http\Controllers\Admin\AdminTentangController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminTagController;
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\Client\ClientLinkController;
use App\Http\Controllers\Client\ClientEraController;
use App\Http\Controllers\Client\ClientCategoryController;

// CLIENT SIDE
Route::get('/', [HomeController::class, 'index'])->name('beranda');

Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/era', [ClientEraController::class, 'index'])->name('era');
Route::get('/era/{category}', [ClientEraController::class, 'show'])->name('era.show');
Route::get('/era/{category}/{data}', [ClientEraController::class, 'category'])->name('era.category');
Route::get('/link', [ClientLinkController::class, 'index'])->name('link');
Route::get('/link/{category}', [ClientLinkController::class, 'show'])->name('link.show');
Route::get('/link/{category}/{data}', [ClientLinkController::class, 'category'])->name('link.category');
Route::get('/category', [ClientCategoryController::class, 'index'])->name('category');
Route::get('/category/{data}', [ClientCategoryController::class, 'show'])->name('category.show');

// OAuth
Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect'])->name('auth.redirect');
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback'])->name('auth.callback');

require __DIR__ . '/auth.php';

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
    Route::put('/alumni/{id}/restore', [AdminAlumniController::class, 'restore'])->name('alumni.restore');
    Route::put('/alumni/restoreAll', [AdminAlumniController::class, 'restoreAll'])->name('alumni.restoreAll');

    // CRUD BERITA
    Route::get('/berita', [AdminBeritaController::class, 'index'])->name('berita.index');
    Route::post('/berita', [AdminBeritaController::class, 'store'])->name('berita.store');
    Route::put('/berita/{id}/update', [AdminBeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{id}/destroy', [AdminBeritaController::class, 'destroy'])->name('berita.destroy');
    Route::post('/berita/import', [AdminBeritaController::class, 'import'])->name('berita.import');
    Route::get('/berita/export', [AdminBeritaController::class, 'export'])->name('berita.export');
    Route::delete('/berita/deleteAll', [AdminBeritaController::class, 'destroyAll'])->name('berita.destroyAll');
    Route::put('/berita/{id}/restore', [AdminBeritaController::class, 'restore'])->name('berita.restore');
    Route::put('/berita/restoreAll', [AdminBeritaController::class, 'restoreAll'])->name('berita.restoreAll');

    // CRUD JADWAL
    Route::get('/jadwal', [AdminJadwalController::class, 'index'])->name('jadwal.index');
    Route::post('/jadwal', [AdminJadwalController::class, 'store'])->name('jadwal.store');
    Route::put('/jadwal/{id}/update', [AdminJadwalController::class, 'update'])->name('jadwal.update');
    Route::delete('/jadwal/{id}/destroy', [AdminJadwalController::class, 'destroy'])->name('jadwal.destroy');
    Route::post('/jadwal/import', [AdminJadwalController::class, 'import'])->name('jadwal.import');
    Route::get('/jadwal/export', [AdminJadwalController::class, 'export'])->name('jadwal.export');
    Route::delete('/jadwal/deleteAll', [AdminJadwalController::class, 'destroyAll'])->name('jadwal.destroyAll');
    Route::put('/jadwal/{id}/restore', [AdminJadwalController::class, 'restore'])->name('jadwal.restore');
    Route::put('/jadwal/restoreAll', [AdminJadwalController::class, 'restoreAll'])->name('jadwal.restoreAll');

    // CRUD KATEGORI
    Route::get('/kategori', [AdminKategoriController::class, 'index'])->name('kategori.index');
    Route::post('/kategori', [AdminKategoriController::class, 'store'])->name('kategori.store');
    Route::put('/kategori/{id}/update', [AdminKategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{id}/destroy', [AdminKategoriController::class, 'destroy'])->name('kategori.destroy');
    Route::post('/kategori/import', [AdminKategoriController::class, 'import'])->name('kategori.import');
    Route::get('/kategori/export', [AdminKategoriController::class, 'export'])->name('kategori.export');
    Route::delete('/kategori/deleteAll', [AdminKategoriController::class, 'destroyAll'])->name('kategori.destroyAll');
    Route::put('/kategori/{id}/restore', [AdminKategoriController::class, 'restore'])->name('kategori.restore');
    Route::put('/kategori/restoreAll', [AdminKategoriController::class, 'restoreAll'])->name('kategori.restoreAll');

    // CRUD LAYANAN
    Route::get('/layanan', [AdminLayananController::class, 'index'])->name('layanan.index');
    Route::post('/layanan', [AdminLayananController::class, 'store'])->name('layanan.store');
    Route::put('/layanan/{id}/update', [AdminLayananController::class, 'update'])->name('layanan.update');
    Route::delete('/layanan/{id}/destroy', [AdminLayananController::class, 'destroy'])->name('layanan.destroy');
    Route::post('/layanan/import', [AdminLayananController::class, 'import'])->name('layanan.import');
    Route::get('/layanan/export', [AdminLayananController::class, 'export'])->name('layanan.export');
    Route::delete('/layanan/deleteAll', [AdminLayananController::class, 'destroyAll'])->name('layanan.destroyAll');
    Route::put('/layanan/{id}/restore', [AdminLayananController::class, 'restore'])->name('layanan.restore');
    Route::put('/layanan/restoreAll', [AdminLayananController::class, 'restoreAll'])->name('layanan.restoreAll');

    // CRUD LINK
    Route::get('/link', [AdminLinkController::class, 'index'])->name('link.index');
    Route::post('/link', [AdminLinkController::class, 'store'])->name('link.store');
    Route::put('/link/{id}/update', [AdminLinkController::class, 'update'])->name('link.update');
    Route::delete('/link/{id}/destroy', [AdminLinkController::class, 'destroy'])->name('link.destroy');
    Route::post('/link/import', [AdminLinkController::class, 'import'])->name('link.import');
    Route::get('/link/export', [AdminLinkController::class, 'export'])->name('link.export');
    Route::delete('/link/deleteAll', [AdminLinkController::class, 'destroyAll'])->name('link.destroyAll');
    Route::put('/link/{id}/restore', [AdminLinkController::class, 'restore'])->name('link.restore');
    Route::put('/link/restoreAll', [AdminLinkController::class, 'restoreAll'])->name('link.restoreAll');

    // CRUD MATA KULIAH
    Route::get('/matkul', [AdminMatkulController::class, 'index'])->name('matkul.index');
    Route::post('/matkul', [AdminMatkulController::class, 'store'])->name('matkul.store');
    Route::put('/matkul/{id}/update', [AdminMatkulController::class, 'update'])->name('matkul.update');
    Route::delete('/matkul/{id}/destroy', [AdminMatkulController::class, 'destroy'])->name('matkul.destroy');
    Route::post('/matkul/import', [AdminMatkulController::class, 'import'])->name('matkul.import');
    Route::get('/matkul/export', [AdminMatkulController::class, 'export'])->name('matkul.export');
    Route::delete('/matkul/deleteAll', [AdminMatkulController::class, 'destroyAll'])->name('matkul.destroyAll');
    Route::put('/matkul/{id}/restore', [AdminMatkulController::class, 'restore'])->name('matkul.restore');
    Route::put('/matkul/restoreAll', [AdminMatkulController::class, 'restoreAll'])->name('matkul.restoreAll');

    // CRUD MEDIA PARTNER
    Route::get('/medpart', [AdminMedpartController::class, 'index'])->name('medpart.index');
    Route::post('/medpart', [AdminMedpartController::class, 'store'])->name('medpart.store');
    Route::put('/medpart/{id}/update', [AdminMedpartController::class, 'update'])->name('medpart.update');
    Route::delete('/medpart/{id}/destroy', [AdminMedpartController::class, 'destroy'])->name('medpart.destroy');
    Route::post('/medpart/import', [AdminMedpartController::class, 'import'])->name('medpart.import');
    Route::get('/medpart/export', [AdminMedpartController::class, 'export'])->name('medpart.export');
    Route::delete('/medpart/deleteAll', [AdminMedpartController::class, 'destroyAll'])->name('medpart.destroyAll');
    Route::put('/medpart/{id}/restore', [AdminMedpartController::class, 'restore'])->name('medpart.restore');
    Route::put('/medpart/restoreAll', [AdminMedpartController::class, 'restoreAll'])->name('medpart.restoreAll');

    // CRUD STAFF
    Route::get('/staff', [AdminStaffController::class, 'index'])->name('staff.index');
    Route::post('/staff', [AdminStaffController::class, 'store'])->name('staff.store');
    Route::put('/staff/{id}/update', [AdminStaffController::class, 'update'])->name('staff.update');
    Route::delete('/staff/{id}/destroy', [AdminStaffController::class, 'destroy'])->name('staff.destroy');
    Route::post('/staff/import', [AdminStaffController::class, 'import'])->name('staff.import');
    Route::get('/staff/export', [AdminStaffController::class, 'export'])->name('staff.export');
    Route::delete('/staff/deleteAll', [AdminStaffController::class, 'destroyAll'])->name('staff.destroyAll');
    Route::put('/staff/{id}/restore', [AdminStaffController::class, 'restore'])->name('staff.restore');
    Route::put('/staff/restoreAll', [AdminStaffController::class, 'restoreAll'])->name('staff.restoreAll');

    // CRUD TAG
    Route::get('/tag', [AdminTagController::class, 'index'])->name('tag.index');
    Route::post('/tag', [AdminTagController::class, 'store'])->name('tag.store');
    Route::put('/tag/{id}/update', [AdminTagController::class, 'update'])->name('tag.update');
    Route::delete('/tag/{id}/destroy', [AdminTagController::class, 'destroy'])->name('tag.destroy');
    Route::post('/tag/import', [AdminTagController::class, 'import'])->name('tag.import');
    Route::get('/tag/export', [AdminTagController::class, 'export'])->name('tag.export');
    Route::delete('/tag/deleteAll', [AdminTagController::class, 'destroyAll'])->name('tag.destroyAll');
    Route::put('/tag/{id}/restore', [AdminTagController::class, 'restore'])->name('tag.restore');
    Route::put('/tag/restoreAll', [AdminTagController::class, 'restoreAll'])->name('tag.restoreAll');

    // CRUD TENTANG
    Route::get('/tentang', [AdminTentangController::class, 'index'])->name('tentang.index');
    Route::post('/tentang', [AdminTentangController::class, 'store'])->name('tentang.store');
    Route::put('/tentang/{id}/update', [AdminTentangController::class, 'update'])->name('tentang.update');
    Route::delete('/tentang/{id}/destroy', [AdminTentangController::class, 'destroy'])->name('tentang.destroy');
    Route::post('/tentang/import', [AdminTentangController::class, 'import'])->name('tentang.import');
    Route::get('/tentang/export', [AdminTentangController::class, 'export'])->name('tentang.export');
    Route::delete('/tentang/deleteAll', [AdminTentangController::class, 'destroyAll'])->name('tentang.destroyAll');
    Route::put('/tentang/{id}/restore', [AdminTentangController::class, 'restore'])->name('tentang.restore');
    Route::put('/tentang/restoreAll', [AdminTentangController::class, 'restoreAll'])->name('tentang.restoreAll');
  });
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/{link}/{category}', [HomeController::class, 'show'])->name('beranda.show');
