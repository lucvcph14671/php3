<?php

use App\Http\Controllers\AthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('list', [UserController::class, 'index'])->name('list');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [UserController::class, 'destroy'])->name('delete');
        Route::get('role/{id}', [UserController::class, 'role'])->name('role');
    });
    Route::prefix('product')->name('product.')->group(function () {
        Route::get('list', [ProductController::class, 'index'])->name('list');
        Route::get('create', [ProductController::class, 'create'])->name('create');
        Route::post('store', [ProductController::class, 'store'])->name('store');
        Route::get('status/{id}', [ProductController::class, 'status'])->name('status');
        Route::delete('delete/{id}', [ProductController::class, 'destroy'])->name('delete');
    });
});

Route::get('/', [AthController::class, 'index'])->name('/')->middleware('guest');
Route::get('dang-ki', [AthController::class, 'dang_ki'])->name('dang-ki')->middleware('guest');
Route::post('tai-khoan-moi', [AthController::class, 'add'])->name('tai-khoan-moi')->middleware('guest');
Route::post('dang-nhap', [AthController::class, 'login'])->name('dang-nhap')->middleware('guest');
Route::get('dang-xuat', [AthController::class, 'logout'])->name('dang-xuat')->middleware('auth');

















Route::get('/register', function () {
    return view('register');
});

Route::get('/list', function () {
    return view('list');
});

Route::get('/add', function () {
    return view('add');
});

Route::get('/register-success', function () {

    return view('register-success');
})->name('r-s');
