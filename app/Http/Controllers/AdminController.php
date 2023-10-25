<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Pribadi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        $title = 'Dashboard Admin';
        $tidakAlumni = User::whereDoesntHave('roles', function ($query) {
            $query->whereIn('name', ['Alumni', 'Admin']);
        })
            ->join('data_pribadi', 'users.id_user', '=', 'data_pribadi.id_user')
            ->orderBy('users.name', 'ASC')
            ->get();
        $title_page = 'Selamat Datang, Admin';
        return view('admin.dashboard', compact('tidakAlumni', 'title', 'title_page'));
    }

    public function dataAlumni(Request $request)
    {
        $name = $request->search;
        $angkatan = $request->angkatan;
        $alumni = User::whereHas('roles', function ($query) {
            $query->where('name', 'Alumni');
        })
            ->join('data_pribadi', 'users.id_user', '=', 'data_pribadi.id_user')
            ->join('jurusan', 'data_pribadi.id_jurusan', '=', 'jurusan.id_jurusan')
            ->orderBy('users.name', 'ASC')
            ->filter(request(['search', 'angkatan']))
            ->get();

        $tidakAlumni = User::whereDoesntHave('roles', function ($query) {
            $query->whereIn('name', ['Alumni', 'Admin']);
        })
            ->join('data_pribadi', 'users.id_user', '=', 'data_pribadi.id_user')
            ->orderBy('users.name', 'ASC')
            ->get();

        $title = 'Data Alumni';
        $title_page = 'Lihat Data Alumni';
        return view('admin.alumni.index', compact('alumni', 'name', 'tidakAlumni', 'angkatan', 'title', 'title_page'));
    }

    public function detailAlumni($id)
    {
        $title = 'Detail Alumni';
        $dataPribadi = Pribadi::where('id_pribadi', $id)->first();
        $dataPekerjaan = Pekerjaan::where('id_pribadi', $dataPribadi->id_pribadi)->get();
        $dataPendidikan = Pendidikan::where('id_pribadi', $dataPribadi->id_pribadi)->get();
        // $title_page = 'Detail';
        return view('admin.alumni.detail', compact('dataPribadi', 'dataPekerjaan', 'dataPendidikan',  'title'));
    }

    public function dataPekerjaan()
    {
        $pekerjaan = Pekerjaan::with('alumni')->get();
        return view('admin.pekerjaan.index', compact('pekerjaan'))->with('i');
    }

    public function verifAlumni()
    {
        $tidakAlumni = User::whereDoesntHave('roles', function ($query) {
            $query->whereIn('name', ['Alumni', 'Admin']);
        })
            ->join('data_pribadi', 'users.id_user', '=', 'data_pribadi.id_user')
            ->join('jurusan', 'data_pribadi.id_jurusan', '=', 'jurusan.id_jurusan')
            ->orderBy('users.name', 'ASC')
            ->get();

        $title = "Verifikasi Data Alumni";
        $title_page = "Verifikasi Data Alumni";
        return view('admin.verifalumni.index', compact('tidakAlumni', 'title', 'title_page'));
    }

    public function verifAlumniAksi($id_user)
    {
        $user = User::where('id_user', $id_user)->first();
        $user->assignRole('Alumni');

        return redirect()->back()->with(['message' => 'Permintaan Verifikasi Berhasil']);
    }

    public function tolakVerifAlumniAksi($id_user)
    {
        $user = Pribadi::where('id_user', $id_user)->first();
        $user->delete();


        return redirect()->back()->with(['message' => 'Permintaan Verifikasi Berhasil Ditolak']);
    }
}
