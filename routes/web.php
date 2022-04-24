<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\TampilController;
use Illuminate\Http\Request;
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
Route::get('/home',[PageController::class, 'home']);
// 

Route::resource('mahasiswa', MahasiswaController::class);
Route::get('search', [MahasiswaController::class,'search'])->name('search');
Route::get('mahasiswa/nilai/{nim}', [MahasiswaController::class, 'nilai'])->name('mahasiswa.nilai');

Route::get('mahasiswa/nilai/{nim}/cetak_pdf', [MahasiswaController::class,'cetak_pdf'])->name('mahasiswa.cetak_pdf');