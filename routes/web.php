<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserController::class, 'index']);
Route::post('/', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);
// Route::get('kantin', [ProductController::class, 'index']);

// Kantin
Route::get('/', [ProductController::class, 'transacount']);
Route::get('add-product', [ProductController::class, 'create']);
Route::post('add-product/create', [ProductController::class, 'store']);
Route::get('edit-product/{id}', [ProductController::class, 'edit']);
Route::put('/put-product/{id}', [ProductController::class, 'update']);
Route::post('delete-product/{id}', [ProductController::class, 'destroy']);
Route::get('transaction', [ProductController::class, 'transaction']);


// Bank
Route::get('/', [UserController::class, 'index']);
Route::get('/topup', [BankController::class, 'topup_get']);
Route::post('/topup', [BankController::class, 'topup_post']);
Route::get('/topup/pending', [BankController::class, 'pending_get']);
Route::post('/topup/pending/{id}', [BankController::class, 'pending_post']);
Route::get('/transactions', [BankController::class, 'transactions']);
Route::get('/withdraw', [BankController::class, 'withdraw_get']);
Route::post('/withdraw', [BankController::class, 'withdraw_post']);

// Siswa
Route::get('/siswa/products', [SiswaController::class, 'products']);
Route::post('/cart/{id}', [SiswaController::class, 'addCart']);
Route::get('/siswa/topup', [SiswaController::class, 'topup_get']);
Route::post('/siswa/topup', [SiswaController::class, 'topup_post']);
Route::get('/siswa/cart', [SiswaController::class, 'cart_get']);
Route::post('/siswa/cart', [SiswaController::class, 'cart_post']);
Route::get('/siswa/transactions', [SiswaController::class, 'transaction_get']);
Route::get('/siswa/cart/past', [SiswaController::class, 'pastcart_get']);
Route::get('/siswa/cart/invoice/{code}', [SiswaController::class, 'invoice']);