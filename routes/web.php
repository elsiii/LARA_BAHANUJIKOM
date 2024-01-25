<?php

use Illuminate\Support\Facades\Route;
//LOAD CONTROLLER
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataPenggunaController;
use App\Http\Controllers\DataBarangController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//INDEX
Route::get('/', [LoginController::class, 'index'])->middleware('guest');

//AUTH MANUAL
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login')->middleware('guest');
Route::match(['get','post'],'/logout', [LoginController::class, 'logout'])->name('logout');

//BACK OFFICE
Route::resource('/dashboard','DashboardController')->except(['show'])->middleware(['auth','roleaccess:administrator,operator']);
Route::match(['get','post'],'/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth','roleaccess:administrator,operator']);

Route::resource('/data_barang','DataBarangController')->except(['show'])->middleware(['auth','roleaccess:administrator,operator']);
Route::match(['get','post'],'/data_barang', [DataBarangController::class, 'index'])->name('data_barang')->middleware(['auth','roleaccess:administrator,operator']);
Route::get('/data_barang/input', [DataBarangController::class, 'input'])->name('data_barang.input')->middleware(['auth','roleaccess:administrator,operator']);
Route::post('/data_barang/create', [DataBarangController::class, 'create'])->name('data_barang.create')->middleware(['auth','roleaccess:administrator,operator']);
Route::get('/data_barang/edit/{id}', [DataBarangController::class, 'edit'])->name('data_barang.edit')->middleware(['auth','roleaccess:administrator,operator']);
Route::put('/data_barang/update/{id}', [DataBarangController::class, 'update'])->name('data_barang.update')->middleware(['auth','roleaccess:administrator,operator']);
Route::delete('/data_barang/destroy/{id}', [DataBarangController::class, 'destroy'])->name('data_barang.destroy')->middleware(['auth','roleaccess:administrator,operator']);
Route::post('/data_barang/import_excel', [DataBarangController::class, 'import_excel'])->name('data_barang.import_excel')->middleware(['auth','roleaccess:administrator,operator']);
Route::get('/data_barang/export_excel', [DataBarangController::class, 'export_excel'])->name('data_barang.export_excel')->middleware(['auth','roleaccess:administrator,operator']);
Route::get('/data_barang/export_pdf', [DataBarangController::class, 'export_pdf'])->name('data_barang.export_pdf')->middleware(['auth','roleaccess:administrator,operator']);

Route::group(['middleware'=>['auth','roleaccess:administrator']], function(){
    Route::resource('/data_pengguna','DataPenggunaController')->except(['show']);
    Route::match(['get','post'],'/data_pengguna', [DataPenggunaController::class, 'index'])->name('data_pengguna');
    Route::get('/data_pengguna/input', [DataPenggunaController::class, 'input'])->name('data_pengguna.input');
    Route::post('/data_pengguna/create', [DataPenggunaController::class, 'create'])->name('data_pengguna.create');
    Route::get('/data_pengguna/edit/{id}', [DataPenggunaController::class, 'edit'])->name('data_pengguna.edit');
    Route::put('/data_pengguna/update/{id}', [DataPenggunaController::class, 'update'])->name('data_pengguna.update');
    Route::delete('/data_pengguna/destroy/{id}', [DataPenggunaController::class, 'destroy'])->name('data_pengguna.destroy');
    Route::post('/data_pengguna/import_excel', [DataPenggunaController::class, 'import_excel'])->name('data_pengguna.import_excel');
    Route::get('/data_pengguna/export_excel', [DataPenggunaController::class, 'export_excel'])->name('data_pengguna.export_excel');
    Route::get('/data_pengguna/export_pdf', [DataPenggunaController::class, 'export_pdf'])->name('data_pengguna.export_pdf');
});
