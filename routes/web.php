<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ErrorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\KasMasjidController;
use App\Http\Controllers\Admin\PembangunanController;
use App\Http\Controllers\Admin\AnggaranController;
use App\Http\Controllers\Admin\PengeluaranController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PengaturanController;


Route::controller(AuthController::class)->group(function() {
    Route::get('/', 'index')->name('login');
    Route::post('/login', 'authenticate')->name('auth.do_login');
    Route::get('/register', 'register')->name('auth.register');
    Route::post('/register', 'doRegister')->name('auth.do_register');
    Route::get('/logout', 'logout')->name('auth.logout');
});

Route::prefix('admin')->middleware('auth')->group(function() {
    Route::controller(DashboardController::class)->group(function() {
        Route::get('/', 'index')->name('dashboard.index');
    });
    Route::controller(MaterialController::class)->group(function() {
        Route::get('/material', 'index')->name('material.index');
        Route::get('/material/create', 'create')->name('material.create');
        Route::post('/material/create', 'store')->name('material.store');
        Route::get('/material/edit/{id}', 'edit')->name('material.edit');
        Route::put('/material/edit/{id}', 'update')->name('material.update');
        Route::get('/material/delete/{id}', 'delete')->name('material.delete');
    });

    Route::controller(KasMasjidController::class)->group(function() {
        Route::get('/kas', 'index')->name('kas.index');
        Route::post('/kas', 'store')->name('kas.store');
        Route::get('/kas/edit/{id}', 'edit')->name('kas.edit');
        Route::put('/kas/edit/{id}', 'update')->name('kas.update');
        Route::get('/kas/delete/{id}', 'delete')->name('kas.delete');
    });

    Route::controller(PembangunanController::class)->group(function() {
        Route::get('/pembangunan', 'index')->name('pembangunan.index');
        Route::post('/pembangunan', 'store')->name('pembangunan.store');
        Route::get('/pembangunan/edit/{id}', 'edit')->name('pembangunan.edit');
        Route::put('/pembangunan/edit/{id}', 'update')->name('pembangunan.update');
        Route::get('/pembangunan/delete/{id}', 'delete')->name('pembangunan.delete');
    });

    Route::controller(AnggaranController::class)->group(function() {
        Route::get('/anggaran', 'index')->name('anggaran.index');
        Route::get('/anggaran/create', 'create')->name('anggaran.create');
        Route::get('/anggaran/detail/{id}', 'detail')->name('anggaran.detail');
        Route::get('/anggaran/print/{id}', 'print')->name('anggaran.print');
        Route::post('/anggaran/create', 'store')->name('anggaran.store');
        Route::get('/anggaran/edit/{id}', 'edit')->name('anggaran.edit');
        Route::put('/anggaran/edit/{id}', 'update')->name('anggaran.update');
        Route::get('/anggaran/delete/{id}', 'delete')->name('anggaran.delete');
    });

    Route::controller(PengeluaranController::class)->group(function() {
        Route::get('/pengeluaran', 'index')->name('pengeluaran.index');
        Route::get('/pengeluaran/create', 'create')->name('pengeluaran.create');
        Route::get('/pengeluaran/detail/{id}', 'detail')->name('pengeluaran.detail');
        Route::get('/pengeluaran/print/{id}', 'print')->name('pengeluaran.print');
        Route::post('/pengeluaran/create', 'store')->name('pengeluaran.store');
        Route::get('/pengeluaran/edit/{id}', 'edit')->name('pengeluaran.edit');
        Route::put('/pengeluaran/edit/{id}', 'update')->name('pengeluaran.update');
        Route::get('/pengeluaran/delete/{id}', 'delete')->name('pengeluaran.delete');
    });

    Route::controller(UserController::class)->group(function() {
      Route::get('/user', 'index')->name('user.index');
      Route::post('/user', 'store')->name('user.store');
      Route::get('/user/edit/{id}', 'edit')->name('user.edit');
      Route::put('/user/edit/{id}', 'update')->name('user.update');
      Route::get('/user/delete/{id}', 'delete')->name('user.delete');
  });

  Route::controller(PengaturanController::class)->group(function() {
    Route::get('/setting', 'index')->name('setting.index');
  });

});

Route::get('/404', [ErrorController::class, 'notFound'])->name('404');
