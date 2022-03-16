<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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
Route::get('/barang',[PageController::class, 'barang']);
Route::get('/pelanggan',[PageController::class, 'pelanggan']);
Route::get('/pegawai',[PageController::class, 'pegawai']);
Route::get('/suplier',[PageController::class, 'suplier']);
