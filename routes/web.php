<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\newsletterController;
use App\Http\Controllers\authController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [newsletterController::class, 'index'])->name('ns.index');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('ns.login');
Route::post('/register', [AuthController::class, 'register'])->name('ns.register');
Route::post('/login', [AuthController::class, 'login'])->name('ns.login.submit');

