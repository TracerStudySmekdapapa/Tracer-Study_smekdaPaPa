<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PribadiController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
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

Route::get('/', [HomeController::class, 'index'])->name('/');



// ==================================================================
/* 
perbaiki ini  dari baris 40 sampai baris 59, pindahkan ke controller motode pengambilan datanya 
perbaiki letak barisnya , letakkan sesuati "data-pekerjaan" , "data-pendidikan"
 */
// ==================================================================


Route::get(
    '/alumni/{id}/data-pekerjaan/more-detail',
    function ($id) {

        $pekerjaan = Pekerjaan::get()->where('id_pribadi', $id);
        $title = 'data pekerjaan';
        return view('pages.moreDetail.pekerjaan', compact('title', 'pekerjaan'));
    }
)->name('moreDataPekerjaan');

Route::get(
    '/alumni/{id}/data-pendidikan/more-detail',
    function ($id) {

        $pendidikan = Pendidikan::get()->where('id_pribadi', $id);
        $title = 'data pendidikan';
        return view('pages.moreDetail.pendidikan', compact('title', 'pendidikan'));
    }
)->name('moreDataPendidikan');

// ==================================================================
Route::get('/test', function () {
    $title = 'Detail Alumni';
    return view('test.detail', compact('title'));
});

Route::get('/authenticate', [AuthenticateController::class, 'index'])->middleware(['auth', 'verified'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    // // user edit selft
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // admin
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('adminDashboard');
    Route::get('/admin/alumni', [AdminController::class, 'dataAlumni'])->name('dataAlumni');
    Route::get('/admin/alumni/{id}/detail', [AdminController::class, 'detailAlumni'])->name('adminDetailAlumni');
    Route::get('/admin/alumni/data-pekerjaan', [AdminController::class, 'dataPekerjaan'])->name('dataPekerjaan');
    Route::get('/admin/alumni/verify', [AdminController::class, 'verifAlumni'])->name('verifyDataAlumni');
    Route::post('/admin/alumni/{id_user}/verify', [AdminController::class, 'verifAlumniAksi'])->name('verifalumniStore');
    Route::post('/admin/alumni/{id_user}/tolakverify', [AdminController::class, 'tolakVerifAlumniAksi'])->name('tolakVerifAlumni');

    // alumi 
    Route::get('/alumni/dashboard', [PribadiController::class, 'index'])->name('alumniDashboard');

    // data pribadi
    Route::get('/alumni/data-pribadi/tambah', [PribadiController::class, 'tambahDataPribadi'])->name('tambahDataPribadi');
    Route::post('/alumni/{id}/data-pribadi/tambah', [PribadiController::class, 'simpanDataPribadi'])->name('simpanDataPribadi');
    Route::get('/alumni/{id}/data-pribadi/edit', [PribadiController::class, 'editDataPribadi'])->name('editDataPribadi');
    Route::patch('/alumni/{id}/data-pribadi/update', [PribadiController::class, 'updateDataPribadi'])->name('updateDataPribadi');

    // data pekerjaan
    Route::get('/alumni/data-pekerjaan/tambah', [PribadiController::class, 'tambahDataPekerjaan'])->name('tambahDataPekerjaan');
    Route::post('/alumni/{id}/data-pekerjaan/tambah', [PribadiController::class, 'simpanDataPekerjaan'])->name('simpanDataPekerjaan');
    Route::get('/alumni/{id}/data-pekerjaan/edit', [PribadiController::class, 'editDataPekerjaan'])->name('editDataPekerjaan');
    Route::patch('/alumni/{id}/data-pekerjaan/update', [PribadiController::class, 'updateDataPekerjaan'])->name('updateDataPekerjaan');
    Route::get('/alumni/{id}/data-pekerjaan/detail', [PribadiController::class, 'detailDataPekerjaan'])->name('detailDataPekerjaan');
    Route::delete('/alumni/{id}/data-pekerjaan', [PribadiController::class, 'deleteDataPekerjaan'])->name('deleteDataPekerjaan');

    // data pendidikan
    Route::get('/alumni/data-pendidikan/tambah', [PribadiController::class, 'tambahDataPendidikan'])->name('tambahDataPendidikan');
    Route::post('/alumni/{id}/data-pendidikan/tambah', [PribadiController::class, 'simpanDataPendidikan'])->name('simpanDataPendidikan');
    Route::get('/alumni/{id}/data-pendidikan/edit', [PribadiController::class, 'editDataPendidikan'])->name('editDataPendidikan');
    Route::patch('/alumni/{id}/data-pendidikan/update', [PribadiController::class, 'updateDataPendidikan'])->name('updateDataPendidikan');
    Route::get('/alumni/{id}/data-pendidikan/detail', [PribadiController::class, 'detailDataPendidikan'])->name('detailDataPendidikan');
    Route::delete('/alumni/{id}/data-pendidikan', [PribadiController::class, 'deleteDataPendidikan'])->name('deleteDataPendidikan');
});

// semua otrang
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/alumni/{id}/detail', [HomeController::class, 'detail'])->name('detailAlumni');


require __DIR__ . '/auth.php';
