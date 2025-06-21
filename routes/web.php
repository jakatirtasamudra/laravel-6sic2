<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'Mahasiswa']);
Route::post('/mahasiswa/simpan', [HomeController::class, 'Mahasiswa_Simpan']);

Route::post('/login', [AuthController::class, 'Login']);
Route::post('/loginmahasiswa', [AuthController::class, 'Login_Mahasiswa']);
Route::get('/logout', [AuthController::class, 'Logout']);

Route::get('/admin', [AdminController::class, 'Admin'])->middleware('auth.session');
Route::get('/admin/hapus/{id}', [AdminController::class, 'Admin_Hapus'])->middleware('auth.session');
Route::get('/admin/validasi/{id}', [AdminController::class, 'Admin_Validasi'])->middleware('auth.session');
Route::get('/admin/tolak/{id}', [AdminController::class, 'Admin_Tolak'])->middleware('auth.session');

Route::get('/mahasiswa', [MahasiswaController::class, 'IndexMahasiswa'])->middleware('auth.session.mahasiswa');
Route::get('/mahasiswa/bayar', [MahasiswaController::class, 'IndexMahasiswa_Bayar'])->middleware('auth.session.mahasiswa');

