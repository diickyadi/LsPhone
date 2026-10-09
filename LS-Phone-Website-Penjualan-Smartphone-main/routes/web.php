<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminIphoneController;
use App\Http\Controllers\AdminTestimoniController;
use App\Http\Controllers\AdminSliderController;
use App\Http\Controllers\AdminAccessoriesController;
use App\Http\Controllers\AdminAboutController;


/*
|--------------------------------------------------------------------------
| ROUTE USER (PENGUNJUNG WEBSITE)
|--------------------------------------------------------------------------
*/

// HOME (slider + produk unggulan + testimoni)
Route::get('/', [HomeController::class, 'index'])->name('home');

// SEARCH PRODUK
Route::get('/produk/search', [ProductController::class, 'search'])->name('produk.search');

// KATALOG PRODUK
Route::get('/allproduk',   [ProductController::class, 'index'])->name('allproduk');
Route::get('/exibox',      [ProductController::class, 'exibox'])->name('exibox');
Route::get('/wifionly',    [ProductController::class, 'wifionly'])->name('wifionly');
Route::get('/beacukai',    [ProductController::class, 'beacukai'])->name('beacukai');
Route::get('/accessories', [ProductController::class, 'accessories'])->name('accessories');

// DETAIL PRODUK (PAKAI ID)
Route::get('/produk/{id}', [ProductController::class, 'show'])->name('produk.show');

// DETAIL AKSESORIS (PAKAI ID)
Route::get('/accessories/{id}', [ProductController::class, 'showAccessory'])
    ->name('accessories.show');


/*
|--------------------------------------------------------------------------
| ROUTE LOGIN ADMIN
|--------------------------------------------------------------------------
*/

// FORM LOGIN ADMIN
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

// PROSES LOGIN ADMIN
Route::post('/admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login.post');


/*
|--------------------------------------------------------------------------
| ROUTE ADMIN (DASHBOARD + CRUD)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    // DASHBOARD (TAMBAHAN)
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->middleware('admin.auth')
        ->name('dashboard');

    // LOGOUT
    Route::post('/logout', [AdminAuthController::class, 'logout'])
        ->name('logout');

    // CRUD DATA IPHONE
    Route::resource('iphone', AdminIphoneController::class)
        ->names('iphone')
        ->except(['show']);

    // CRUD DATA AKSESORIS (BARU)
    Route::resource('accessories', AdminAccessoriesController::class)
        ->names('accessories')
        ->except(['show']);

    // CRUD TESTIMONI
    Route::resource('testimoni', AdminTestimoniController::class)
        ->names('testimoni')
        ->except(['show']);

    // CRUD SLIDER
    Route::resource('slider', AdminSliderController::class)
        ->names('slider')
        ->except(['show']);

    // TENTANG
    Route::get('/tentang', [AdminAboutController::class, 'edit'])
        ->name('about.edit');

    Route::post('/tentang', [AdminAboutController::class, 'update'])
        ->name('about.update');

});
