<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-auth', [AuthController::class, 'authenticate'])->name('login.auth');

Route::get('/', function () {
    return view('dashboard');
});
