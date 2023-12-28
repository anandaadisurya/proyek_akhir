<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrudAjaxController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DaftarUserController;
use Illuminate\Support\Facades\Route;

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



Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'auth'])->name('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forget', [AuthController::class, 'forget'])->name('forget');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/reg', [AuthController::class, 'register'])->name('reg');;



Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/dashboard/crud', [CrudController::class, 'index'])->name('crud');
Route::post('/dashboard/crud/store', [CrudController::class, 'store'])->name('crud_tambah');
Route::post('/dashboard/crud/{id}/update', [CrudController::class, 'update'])->name('crud_update');
Route::delete('/dashboard/crud/{id}/destroy', [CrudController::class, 'destroy'])->name('crud_hapus');

Route::get('/dashboard/users', [DaftarUserController::class, 'index'])->name('users');
Route::post('/dashboard/users/store', [DaftarUserController::class, 'store'])->name('user_tambah');
Route::post('/dashboard/users/{id}/update', [DaftarUserController::class, 'update'])->name('user_update');
Route::delete('/dashboard/users/{id}/destroy', [DaftarUserController::class, 'destroy'])->name('user_hapus');

Route::get('/dashboard/produk', [ProdukController::class, 'index'])->name('produk');
Route::post('/dashboard/produk/store', [ProdukController::class, 'store'])->name('produk_tambah');
Route::post('/dashboard/produk/{id}/update', [ProdukController::class, 'update'])->name('produk_update');
Route::delete('/dashboard/produk/{id}/destroy', [ProdukController::class, 'destroy'])->name('produk_hapus');

Route::get('/dashboard/crudAjax', [CrudAjaxController::class, 'index'])->name('crudAjax');
Route::post('/dashboard/crudAjax/store', [CrudAjaxController::class, 'store'])->name('crudAjax_tambah');
Route::post('/dashboard/crudAjax/show', [CrudAjaxController::class, 'show'])->name('crudAjax_show');
Route::post('/dashboard/crudAjax/update', [CrudAjaxController::class, 'update'])->name('crudAjax_update');
Route::post('/dashboard/crudAjax/destroy', [CrudAjaxController::class, 'destroy'])->name('crudAjax_destroy');
