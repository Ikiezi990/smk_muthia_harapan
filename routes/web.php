<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index']);
Route::get('berita/welcome', [App\Http\Controllers\WelcomeController::class, 'berita'])->name('welcome.berita');
Route::get('prestasi/welcome', [App\Http\Controllers\WelcomeController::class, 'prestasi'])->name('welcome.prestasi');
Route::get('visi/welcome', [App\Http\Controllers\WelcomeController::class, 'visi'])->name('welcome.visi');
Route::get('fasilitas/welcome', [App\Http\Controllers\WelcomeController::class, 'fasilitas'])->name('welcome.fasilitas');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('banners', BannerController::class);
Route::resource('beritas', BeritaController::class);
Route::resource('prestasis', PrestasiController::class);
Route::resource('jurusans', JurusanController::class);
Route::resource('gurus', GuruController::class);
Route::resource('mapels', MapelController::class);
Route::resource('kelass', KelasController::class);
Route::resource('siswass', SiswaController::class);
