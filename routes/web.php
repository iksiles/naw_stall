<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\authController;
use App\Http\Controllers\planeController;

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
//Ruta del index
Route::get('/news', [ NewsController::class, 'news'])->name('ns.news');
Route::get('/', [HomeController::class, 'index'])->name('ns.index');

//Rutas de creación de usuario
Route::get('/login', [authController::class, 'showLoginForm'])->name('ns.login');
Route::post('/register', [authController::class, 'register'])->name('ns.register');
Route::post('/login', [authController::class, 'login'])->name('ns.login.submit');

//Rutas del perfil
Route::get('/profile', [authController::class, 'showProfile'])->name('ns.profile');
Route::post('/profile/save', [authController::class, 'saveProfile'])->name('ns.profile.save');
Route::post('/logout', [authController::class, 'logout'])->name('ns.logout');

//Rutas de la wiki
Route::get('/wiki', [planeController::class, 'wikiIndex'])->name('ns.wiki');
Route::get('/wiki/{id}/entry', [planeController::class, 'showEntry'])->name('ns.entryP');
Route::get('/wiki/{id}/entry-Microsoft-flight-simulator', [planeController::class, 'showEntryMsfs'])->name('ns.entryM');

