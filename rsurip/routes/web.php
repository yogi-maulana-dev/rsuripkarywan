<?php

use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Route;

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

Route::get('/karyawan_create', [KaryawanController::class, 'create'])->name('karyawan_create');
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan');
Route::post('/karyawan/store', [KaryawanController::class, 'store'])->name('karyawan.store');
Route::put('/karyawan/update/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
Route::get('/karyawan/edit/{id}', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::get('/karyawan/cetak_pdf', [KaryawanController::class, 'cetak_pdf'])->name('karyawan.cetak_pdf');

Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');
