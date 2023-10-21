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
        $name = $request->name;
        $alumni = User::whereHas('roles', function ($query) {
            $query->where('name', 'Alumni');
        })->join('data_pribadi', 'users.id_user', '=', 'data_pribadi.id_user')
            ->orderBy('users.name', 'ASC')
            ->filter(request(['search']))
            ->get();
        $title = 'dashbord alumni';
        $cekAlumni = Pribadi::where('id_user', Auth::user()->id_user)->exists();
        return view('admin.dashboard', compact('alumni', 'name', 'cekAlumni', 'title'))->with('i');
    }

    public function dataAlumni(Request $request)
    {
        $name = $request->search;
        $angkatan = $request->angkatan;
        $alumni = User::whereHas('roles', function ($query) {
            $query->where('name', 'Alumni');
        })->join('data_pribadi', 'users.id_user', '=', 'data_pribadi.id_user')
            ->orderBy('users.name', 'ASC')
            ->filter(request(['search', 'angkatan']))
            ->get();
        return view('admin.alumni.index', compact('alumni', 'name', 'angkatan'))->with('i');
    }

    public function detailAlumni($id)
    {
        $title = 'Detail Alumni';
        $dataPribadi = Pribadi::where('id_pribadi', $id)->first();
        $dataPekerjaan = Pekerjaan::where('id_pribadi', $dataPribadi->id_pribadi)->get();
        $dataPendidikan = Pendidikan::where('id_pribadi', $dataPribadi->id_pribadi)->get();
        return view('admin.alumni.detail', compact('dataPribadi', 'dataPekerjaan', 'dataPendidikan', 'title'));
    }

    public function dataPekerjaan()
    {
        $pekerjaan = Pekerjaan::with('alumni')->get();
        return view('admin.pekerjaan.index', compact('pekerjaan'))->with('i');
    }

    public function verifAlumni()
    {
        $user = User::whereDoesntHave('roles', function ($query) {
            $query->whereIn('name', ['Alumni', 'Admin']);
        })
            ->join('data_pribadi', 'users.id_user', '=', 'data_pribadi.id_user')
            ->orderBy('users.name', 'ASC')
            ->get();
        // dd($user);
        return view('admin.verifalumni.index', compact('user'))->with('i');
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
