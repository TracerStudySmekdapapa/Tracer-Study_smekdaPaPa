<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\ProfileController;
use App\Models\Alumni;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $alumni = Alumni::get();
    // $alumni = Alumni::get();
    return view('dashboard', compact('alumni'))->with('i');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/authenticate', [AuthenticateController::class, 'index'])->middleware(['auth', 'verified'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/dataalumni', [AdminController::class, 'dataAlumni'])->name('dataAlumni');
    Route::get('/admin/dataalumni/{id}/detail', [AdminController::class, 'detailAlumni'])->name('detailAlumni');
    Route::get('/admin/datapekerjaan', [AdminController::class, 'dataPekerjaan'])->name('dataPekerjaan');
    Route::get('/admin/verifalumni', [AdminController::class, 'verifAlumni'])->name('verifalumni');
    Route::post('/admin/verifalumni/{id_user}', [AdminController::class, 'verifAlumniAksi'])->name('verifalumniStore');

    // Route::get('/alumni', [AlumniController::class, 'index'])->name('alumni');
    Route::get('/alumni/datapribadi/{id}/tambah', [AlumniController::class, 'tambahDataPribadi'])->name('tambahDataPribadi');
    Route::post('/alumni/datapribadi/{id}/tambah', [AlumniController::class, 'simpanDataPribadi'])->name('simpanDataPribadi');

    Route::get('/alumni/tambahdatapekerjaan', [AlumniController::class, 'tambahDataPekerjaan'])->name('tambahDataPekerjaan');
    Route::post('/alumni/tambahdatapekerjaan/{id}', [AlumniController::class, 'simpanDataPekerjaan'])->name('simpanDataPekerjaan');
});

require __DIR__ . '/auth.php';
