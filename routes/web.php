<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminEraController;
use App\Http\Controllers\Admin\AdminFranchiseController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminTagController;
use App\Http\Controllers\Admin\AdminDataController;
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\Client\ClientFranchiseController;
use App\Http\Controllers\Client\ClientEraController;
use App\Http\Controllers\Client\ClientCategoryController;

// CLIENT SIDE
Route::get('/', [HomeController::class, 'index'])->name('beranda');

Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/era', [ClientEraController::class, 'index'])->name('era');
Route::get('/era/{category}', [ClientEraController::class, 'show'])->name('era.show');
Route::get('/era/{category}/{data}', [ClientEraController::class, 'category'])->name('era.category');
Route::get('/franchise', [ClientFranchiseController::class, 'index'])->name('franchise');
Route::get('/franchise/{category}', [ClientFranchiseController::class, 'show'])->name('franchise.show');
Route::get('/franchise/{category}/{data}', [ClientFranchiseController::class, 'category'])->name('franchise.category');
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

    // CRUD ERA
    Route::get('/era', [AdminEraController::class, 'index'])->name('era.index');
    Route::post('/era', [AdminEraController::class, 'store'])->name('era.store');
    Route::put('/era/{id}/update', [AdminEraController::class, 'update'])->name('era.update');
    Route::delete('/era/{id}/destroy', [AdminEraController::class, 'destroy'])->name('era.destroy');
    Route::post('/era/import', [AdminEraController::class, 'import'])->name('era.import');
    Route::get('/era/export', [AdminEraController::class, 'export'])->name('era.export');
    Route::delete('/era/deleteAll', [AdminEraController::class, 'destroyAll'])->name('era.destroyAll');
    Route::put('/era/{id}/restore', [AdminEraController::class, 'restore'])->name('era.restore');
    Route::put('/era/restoreAll', [AdminEraController::class, 'restoreAll'])->name('era.restoreAll');

    // CRUD FRANCHISE
    Route::get('/franchise', [AdminFranchiseController::class, 'index'])->name('franchise.index');
    Route::post('/franchise', [AdminFranchiseController::class, 'store'])->name('franchise.store');
    Route::put('/franchise/{id}/update', [AdminFranchiseController::class, 'update'])->name('franchise.update');
    Route::delete('/franchise/{id}/destroy', [AdminFranchiseController::class, 'destroy'])->name('franchise.destroy');
    Route::post('/franchise/import', [AdminFranchiseController::class, 'import'])->name('franchise.import');
    Route::get('/franchise/export', [AdminFranchiseController::class, 'export'])->name('franchise.export');
    Route::delete('/franchise/deleteAll', [AdminFranchiseController::class, 'destroyAll'])->name('franchise.destroyAll');
    Route::put('/franchise/{id}/restore', [AdminFranchiseController::class, 'restore'])->name('franchise.restore');
    Route::put('/franchise/restoreAll', [AdminFranchiseController::class, 'restoreAll'])->name('franchise.restoreAll');

    // CRUD CATEGORY
    Route::get('/category', [AdminCategoryController::class, 'index'])->name('category.index');
    Route::post('/category', [AdminCategoryController::class, 'store'])->name('category.store');
    Route::put('/category/{id}/update', [AdminCategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}/destroy', [AdminCategoryController::class, 'destroy'])->name('category.destroy');
    Route::post('/category/import', [AdminCategoryController::class, 'import'])->name('category.import');
    Route::get('/category/export', [AdminCategoryController::class, 'export'])->name('category.export');
    Route::delete('/category/deleteAll', [AdminCategoryController::class, 'destroyAll'])->name('category.destroyAll');
    Route::put('/category/{id}/restore', [AdminCategoryController::class, 'restore'])->name('category.restore');
    Route::put('/category/restoreAll', [AdminCategoryController::class, 'restoreAll'])->name('category.restoreAll');

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

    // CRUD DATA
    Route::get('/data', [AdminDataController::class, 'index'])->name('data.index');
    Route::post('/data', [AdminDataController::class, 'store'])->name('data.store');
    Route::put('/data/{id}/update', [AdminDataController::class, 'update'])->name('data.update');
    Route::delete('/data/{id}/destroy', [AdminDataController::class, 'destroy'])->name('data.destroy');
    Route::post('/data/import', [AdminDataController::class, 'import'])->name('data.import');
    Route::get('/data/export', [AdminDataController::class, 'export'])->name('data.export');
    Route::delete('/data/deleteAll', [AdminDataController::class, 'destroyAll'])->name('data.destroyAll');
    Route::put('/data/{id}/restore', [AdminDataController::class, 'restore'])->name('data.restore');
    Route::put('/data/restoreAll', [AdminDataController::class, 'restoreAll'])->name('data.restoreAll');
  });
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/{franchise}/{category}', [HomeController::class, 'show'])->name('beranda.show');
