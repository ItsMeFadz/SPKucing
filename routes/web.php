<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\BasisController;
use App\Http\Controllers\AHPController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Route::get('/login', [LoginController::class, 'index']);
// Route::post('/login/login-proses', [LoginController::class, 'login_proses'])->name('login_proses');
// // Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [LandingPageController::class, 'index'])->name('landing');
Route::get('/diagnosis', [DiagnosisController::class, 'index']);
Route::get('/hasil', [DiagnosisController::class, 'index']);
Route::post('/diagnosis/calculate', [DiagnosisController::class, 'calculate'])->name('diagnosis.calculate');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/login-proses', [LoginController::class, 'login_proses'])->name('login_proses');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('Dashboard');

    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'index');
        Route::get('/user/create', 'create');
        Route::post('/user/store', 'store');
        Route::get('/user/edit/{id}', 'edit');
        Route::post('/user/update/{id}', 'update');
        Route::delete('/user/delete/{id}', 'destroy');
    });
    Route::controller(GejalaController::class)->group(function () {
        Route::get('/gejala', 'index');
        Route::get('/gejala/create', 'create');
        Route::post('/gejala/store', 'store');
        Route::get('/gejala/edit/{id}', 'edit');
        Route::post('/gejala/update/{id}', 'update');
        Route::delete('/gejala/delete/{id}', 'destroy');
    });

    Route::controller(PenyakitController::class)->group(function () {
        Route::get('/penyakit', 'index');
        Route::get('/penyakit/create', 'create');
        Route::post('/penyakit/store', 'store');
        Route::get('/penyakit/edit/{id}', 'edit');
        Route::post('/penyakit/update/{id}', 'update');
        Route::delete('/penyakit/delete/{id}', 'destroy');
        Route::get('/penyakit/search', 'search')->name('penyakit.search');
    });

    Route::controller(ArtikelController::class)->group(function () {
        Route::get('/artikel', 'index');
        Route::get('/artikel/create', 'create');
        Route::post('/artikel/store', 'store');
        Route::get('/artikel/edit/{id}', 'edit');
        Route::post('/artikel/update/{id}', 'update');
        Route::delete('/artikel/delete/{id}', 'destroy');
        Route::get('/artikel/search', 'search')->name('artikel.search');
    });

    Route::group(['prefix' => 'basis'], function () {
        Route::get('/', [BasisController::class, 'index'])->name('basis.index');
        Route::get('/create', [BasisController::class, 'create'])->name('basis.create');
        Route::post('/store', [BasisController::class, 'store'])->name('basis.store');
        Route::get('/edit/{id}', [BasisController::class, 'edit'])->name('basis.edit');
        Route::put('/update/{id}', [BasisController::class, 'update'])->name('basis.update');
        Route::delete('/delete/{id}', [BasisController::class, 'destroy'])->name('basis.destroy');
        Route::get('/search', [BasisController::class, 'search'])->name('basis.search');
        Route::get('/set_bobot/{id}', [BasisController::class, 'set_bobot'])->name('basis.set_bobot');
    });

    // AHP Controller
    Route::post('/save-ahp-data', [AHPController::class, 'saveData'])->name('save-ahp-data');

    // Basis Controller
    Route::post('/store-basis-detail', [BasisController::class, 'storeBasisDetail'])->name('store-basis-detail');
    Route::post('/store-basis-rule', [BasisController::class, 'storeBasisRule'])->name('store-basis-rule');
    Route::put('/basis/{id}', [BasisController::class, 'update'])->name('basis.update');
    Route::delete('/basis/{id}', [BasisController::class, 'destroy'])->name('basis.destroy');



});

