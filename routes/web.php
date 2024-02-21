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

//Ruta del index
Route::get('/index', [newsletterController::class, 'index'])->name('ns.index');

//Rutas de creación de usuario
Route::get('/login', [authController::class, 'showLoginForm'])->name('ns.login');
Route::post('/register', [authController::class, 'register'])->name('ns.register');
Route::post('/login', [authController::class, 'login'])->name('ns.login.submit');

//Rutas del perfil
Route::get('/profile', [authController::class, 'showProfile'])->name('ns.profile');

