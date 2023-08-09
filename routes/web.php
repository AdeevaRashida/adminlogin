<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ArtikelController;

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

Route::prefix('/admin')->namespace('app\Http\Controllers\Admin')->group(function(){
    Route::match(['get', 'post'], 'login', [AdminController::class, 'login']);
    Route::group(['middleware'=>['admin']], function(){
        Route::get('dashboard', [AdminController::class, 'dashboard']);
    });
    Route::get('/artikel', [AdminController::class, 'artikel'])->name('artikel');
    Route::get('/gallery', [AdminController::class, 'gallery'])->name('gallery');
    Route::get('/video', [AdminController::class, 'video'])->name('video');
    Route::get('/infografis', [AdminController::class, 'infografis'])->name('infografis');

    Route::get('artikel-create', [ArtikelController::class, 'create'])->name('create');
    Route::post('artikel-store', [ArtikelController::class, 'store'])->name('store');
});

Route::prefix('/edit')->namespace('app\Http\Controllers')->group(function(){
    Route::get('{id}', [ArtikelController::class, 'edit'])->name('edit');
    Route::put('{id}', [ArtikelController::class, 'update'])->name('update');
});

Route::delete('/{id}', [ArtikelController::class, 'destroy'])->name('destroy');

