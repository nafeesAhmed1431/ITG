<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-auth', [AuthController::class, 'authenticate'])->name('login.auth');


Route::get('/', function () {
    return view('dashboard');
});

Route::get('/purchase/index', [PurchaseController::class, 'index'])->name('purchase.index');
Route::get('/purchase/create', [PurchaseController::class, 'create'])->name('purchase.create');
Route::get('/purchase/return', [PurchaseController::class, 'return'])->name('purchase.return');

Route::get('/sale', [SaleController::class, 'index'])->name('sale.index');
Route::get('/sale/create', [SaleController::class, 'create'])->name('sale.create');
Route::get('/sale/return', [SaleController::class, 'return'])->name('sale.return');

Route::resource('product', ProductController::class);
