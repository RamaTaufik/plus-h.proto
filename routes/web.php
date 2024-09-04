<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\OrderController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/search/{id}', [SearchController::class, 'product'])->name('search.product');
Route::get('/buy/{id}', [OrderController::class, 'buy'])->name('buy');
Route::post('/buy/{id}/store', [OrderController::class, 'store'])->name('product.store');
Route::middleware('role:super-admin')->get('/dashboard', [AdminController::class, 'index'])->name('admin');
Route::middleware('role:super-admin')->get('/dashboard/data/{class}', [AdminController::class, 'data'])->name('admin.data');
Route::middleware('role:super-admin')->post('/dashboard/data/{class}/store', [AdminController::class, 'store'])->name('admin.store');
Route::middleware('role:super-admin')->delete('/dashboard/data/{class}/{data}', [AdminController::class, 'destroy'])->name('admin.delete');
Route::middleware('role:super-admin')->put('/dashboard/data/Orders/{data}', [AdminController::class, 'orders_update'])->name('admin.orders.update');
