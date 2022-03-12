<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use Illuminate\Database\Events\TransactionCommitted;

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

Route::get('/', [DashboardController::class, 'index']);
Route::resource('product', ProductController::class);
Route::get('/product/{id}/gallery', [ProductController::class, 'gallery'])->name('product.gallery');

Route::resource('product-galleries', ProductGalleryController::class);

Route::post('transaction/{id}/status', [TransactionController::class, 'setStatus'])->name('transaction.status');
Route::resource('transaction', TransactionController::class);
Auth::routes(['register' => false]);