<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SearchController;
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
Route::post('/sale/store', [SaleController::class, 'store'])->name('sale.store');
Route::get('/sale/return', [SaleController::class, 'return'])->name('sale.return');

Route::get('product/{id}/delete', [ProductController::class, 'delete'])->name('product.delete');
Route::resource('product', ProductController::class);

Route::get('search/product', [SearchController::class,'product'])->name('search.product');
Route::get('search/account', [SearchController::class,'account'])->name('search.account');
Route::get('search/customer', [SearchController::class,'customer'])->name('search.customer');