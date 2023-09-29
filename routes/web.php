<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\Alumni;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/test', function () {
    $title = 'Detail Alumni';
    return view('test.detail', compact('title'));
});

Route::get('/dashboard', function (Request $request) {
    $name = $request->name;
    $alumni = User::whereHas('roles', function ($query) {
        $query->where('name', 'Alumni');
    })->join('alumni', 'users.id_user', '=', 'alumni.id_user')
        ->orderBy('users.name', 'ASC')
        ->filter(request(['search', 'angkatan']))
        ->get();
    $cekAlumni = Alumni::where('id_user', Auth::user()->id_user)->exists();
    return view('dashboard', compact('alumni', 'name', 'cekAlumni'))->with('i');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/authenticate', [AuthenticateController::class, 'index'])->middleware(['auth', 'verified'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/alumni', [AdminController::class, 'dataAlumni'])->name('dataAlumni');
    Route::get('/admin/alumni/{id}/detail', [AdminController::class, 'detailAlumni'])->name('adminDetailAlumni');
    Route::get('/admin/alumni/data-pekerjaan', [AdminController::class, 'dataPekerjaan'])->name('dataPekerjaan');
    Route::get('/admin/alumni/verify', [AdminController::class, 'verifAlumni'])->name('verifalumni');
    Route::post('/admin/alumni/{id_user}/verify', [AdminController::class, 'verifAlumniAksi'])->name('verifalumniStore');
    Route::post('/admin/alumni/{id_user}/tolakverify', [AdminController::class, 'tolakVerifAlumniAksi'])->name('tolakVerifAlumni');

    Route::get('/alumni/{id}/detail', [AlumniController::class, 'detail'])->name('detailAlumni');

    Route::get('/alumni/data-pribadi/tambah', [AlumniController::class, 'tambahDataPribadi'])->name('tambahDataPribadi');
    Route::post('/alumni/{id}/data-pribadi/tambah', [AlumniController::class, 'simpanDataPribadi'])->name('simpanDataPribadi');
    Route::get('/alumni/{id}/data-pribadi/edit', [AlumniController::class, 'editDataPribadi'])->name('editDataPribadi');
    Route::patch('/alumni/{id}/data-pribadi/edit', [AlumniController::class, 'updateDataPribadi'])->name('updateDataPribadi');

    Route::get('/alumni/data-pekerjaan/tambah', [AlumniController::class, 'tambahDataPekerjaan'])->name('tambahDataPekerjaan');
    Route::post('/alumni/{id}/data-pekerjaan/tambah', [AlumniController::class, 'simpanDataPekerjaan'])->name('simpanDataPekerjaan');

    Route::get('/alumni/data-pendidikan/tambah', [AlumniController::class, 'tambahDataPendidikan'])->name('tambahDataPendidikan');
    Route::post('/alumni/{id}/data-pendidikan/tambah', [AlumniController::class, 'simpanDataPendidikan'])->name('simpanDataPendidikan');
});

require __DIR__ . '/auth.php';
