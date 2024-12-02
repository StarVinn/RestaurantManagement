<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use Illuminate\Routing\Controllers\Middleware;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    Route::resource('menus', MenuController::class);
    Route::resource('orders', OrderController::class);
});



Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('login');
    })->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('post.login');
    Route::get('/register', function () {
        return view('register');
    })->name('register');
    Route::post('/register', [LoginController::class, 'register'])->name('post.register');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');