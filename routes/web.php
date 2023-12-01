<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PribadiController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SurveiController;
use App\Http\Middleware\IsAlumni;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return view('pages.notFound');
});

Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/tutorial', [HomeController::class, 'tutorial'])->name('tutorial');
Route::get('contact', [ContactController::class, 'create'])->name('tambahContact');
Route::post('contact', [ContactController::class, 'store'])->name('simpanContact');

Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/alumni/{id}/detail', [HomeController::class, 'detail'])->name('detailAlumni');
Route::get('/alumni/{id}/data-pendidikan/more-detail', [HomeController::class, 'moreDetailPendidikan'])->name('moreDataPendidikan');
Route::get('/alumni/{id}/data-pekerjaan/more-detail', [HomeController::class, 'moreDetailPekerjaan'])->name('moreDataPekerjaan');


Route::get('/authenticate', [AuthenticateController::class, 'index'])->middleware(['auth', 'verified'])->middleware(['auth', 'verified']);

Route::middleware(['auth'])->group(function () {
    // // user edit selft
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // admin
    Route::middleware('isAdmin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('adminDashboard');

        /* Alumni */
        Route::get('/admin/alumni', [AdminController::class, 'dataAlumni'])->name('dataAlumni');
        Route::get('/admin/alumni/{id}/detail', [AdminController::class, 'detailAlumni'])->name('adminDetailAlumni');

        /* Edit Data Pribadi Alumni */
        Route::get('/admin/alumni/{id}/data-pribadi/edit', [AdminController::class, 'editAlumniPribadi'])->name('editAlumniPribadi');
        Route::patch('/admin/alumni/{id}/data-pendidikan', [AdminController::class, 'updateAlumniPribadi'])->name('updateAlumniPribadi');

        /* Edit Pendidikan Alumni */
        Route::get('/admin/alumni/{id}/data-pendidikan/{id_pendidikan}/edit', [AdminController::class, 'editAlumniPendidikan'])->name('editAlumniPendidikan');
        Route::patch('/admin/alumni/{id}/data-pendidikan/{id_pendidikan}', [AdminController::class, 'updateAlumniPendidikan'])->name('updateAlumniPendidikan');

        /* Edit Pekerjaan Alumni */
        Route::get('/admin/alumni/{id}/data-pekerjaan/{id_pekerjaan}/edit', [AdminController::class, 'editAlumniPekerjaan'])->name('editAlumniPekerjaan');
        Route::patch('/admin/alumni/{id}/data-pekerjaan/{id_pekerjaan}', [AdminController::class, 'updateAlumniPekerjaan'])->name('updateAlumniPekerjaan');

        /* Verif Alumni */
        Route::get('/admin/alumni/verify', [AdminController::class, 'verifAlumni'])->name('verifyDataAlumni');
        Route::post('/admin/alumni/{id_user}/verify', [AdminController::class, 'verifAlumniAksi'])->name('verifalumniStore');
        Route::post('/admin/alumni/{id_user}/tolakverify', [AdminController::class, 'tolakVerifAlumniAksi'])->name('tolakVerifAlumni');

        /* Jurusan */
        Route::get('/admin/jurusan', [JurusanController::class, 'index'])->name('jurusan');
        Route::get('/admin/jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
        Route::get('/admin/jurusan/edit/{id}', [JurusanController::class, 'edit'])->name('jurusan.edit');
        Route::patch('/admin/jurusan/{id}', [JurusanController::class, 'update'])->name('jurusan.update');
        Route::post('/admin/jurusan/store', [JurusanController::class, 'store'])->name('jurusan.store');
        Route::delete('/admin/jurusan/destroy/{id}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');

        /* Contact */
        Route::get('/admin/pesan', [ContactController::class, 'index'])->name('pesan');
        Route::patch('/admin/tolakPesan/{id}', [ContactController::class, 'tolakPesan'])->name('tolakPesan');
        Route::patch('/admin/terimaPesan/{id}', [ContactController::class, 'terimaPesan'])->name('terimaPesan');
        Route::patch('/admin/hidePesan/{id}', [ContactController::class, 'hidePesan'])->name('hidePesan');
        Route::delete('/admin/deletePesan/{id}', [ContactController::class, 'deletePesan'])->name('deletePesan');

        /* Export */
        Route::get('/admin/download/fresh-graduate', [AdminController::class, 'exportFreshGraduate'])->name('exportFreshGraduate');
        Route::get('/admin/download/data_alumni', [AdminController::class, 'exportDataAlumni'])->name('exportDataAlumni');

        /* Survei */
        Route::get('/admin/survei', [SurveiController::class, 'index'])->name('survei');
        Route::get('/admin/survei/create', [SurveiController::class, 'createSurvei'])->name('createSurvei');
        Route::post('/admin/survei/store', [SurveiController::class, 'simpanSurvei'])->name('simpanPertanyaanSurvei');
        Route::get('/admin/survei/edit/{id}', [SurveiController::class, 'editSurvei'])->name('editSurvei');
        Route::patch('/admin/survei/{id}', [SurveiController::class, 'updateSurvei'])->name('updateSurvei');

        Route::get('/admin/alumni/survei', [SurveiController::class, 'dataSurvei'])->name('dataSurvei');
        Route::get('/admin/alumni/survei/{id}/detail', [SurveiController::class, 'detail'])->name('detailUserSurvei');
    });

    // alumni
    Route::middleware('adminRedirect')->group(function () {
        Route::get('/dashboard', [PribadiController::class, 'index'])->name('dashboard');
        Route::get('/data-pribadi/tambah', [PribadiController::class, 'tambahDataPribadi'])->name('tambahDataPribadi');
        Route::post('/data-pribadi/{id}', [PribadiController::class, 'simpanDataPribadi'])->name('simpanDataPribadi');
        Route::get('/data-pribadi/{id}/edit', [PribadiController::class, 'editDataPribadi'])->name('editDataPribadi');
        Route::patch('/data-pribadi/{id}', [PribadiController::class, 'updateDataPribadi'])->name('updateDataPribadi');

        Route::get('/survei', [SurveiController::class, 'tambah'])->name('tambahSurvei');
        Route::post('/survei', [SurveiController::class, 'simpan'])->name('simpanSurvei');
    });

    Route::middleware(IsAlumni::class)->group(function () {
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
});


require __DIR__ . '/auth.php';
