<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Pribadi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $counterData = [
            'alumniTerverif' => PribadiController::semuaAlumni(),
            'alumniBekerja' => PekerjaanController::alumniBekerja(),
            'alumniPendidikan' => PendidikanController::alumniPendidikan()
        ];
        return view('welcome', compact('title', 'counterData'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $tamatan = $request->tamatan;
        $title = 'Cari Alumni';
        if ($search || $tamatan) {
            $alumni = User::whereHas('roles', function ($query) {
                $query->where('name', 'Alumni');
            })->join('data_pribadi', 'users.id_user', '=', 'data_pribadi.id_user')
                ->leftJoin('jurusan', 'data_pribadi.id_jurusan', '=', 'jurusan.id_jurusan')
                ->orderBy('users.name', 'ASC')->filter(request(['search', 'tamatan']))->get();
            return view('pages.search', compact('alumni', 'title', 'search', 'tamatan'));
        }
        return view('pages.search', compact('title', 'search', 'tamatan'));
    }

    public function detail($id)
    {
        $title = 'Detail Alumni';
        $dataPribadi = Pribadi::where('id_pribadi', $id)->first();
        $dataPekerjaan = Pekerjaan::where('id_pribadi', $dataPribadi->id_pribadi)->get();
        $dataPendidikan = Pendidikan::where('id_pribadi', $dataPribadi->id_pribadi)->get();
        return view('pages.detail', compact('dataPribadi', 'dataPekerjaan', 'dataPendidikan', 'title'));
    }

    public function moreDetailPendidikan($id)
    {
        $pendidikan = Pendidikan::where('id_pribadi', $id)->get();
        $name = $pendidikan->first()->alumni->user;
        $title = 'Data Pendidikan ' . Str::ucfirst($name->name);
        return view('pages.moreDetail.pendidikan', compact('title', 'pendidikan'));
    }

    public function moreDetailPekerjaan($id)
    {
        $pekerjaan = Pekerjaan::where('id_pribadi', $id)->get();
        $name = $pekerjaan->first()->alumni->user;
        $title = 'Data Pekerjaan ' . Str::ucfirst($name->name);
        return view('pages.moreDetail.pekerjaan', compact('title', 'pekerjaan'));
    }

    public function tutorial()
    {
        $data = Jurusan::get();
        $title = 'tutorial';
        return view('pages.tutorial', compact('title'));
    }
}
