<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index(Request $request){
        $name = $request->name;
        $alumni = User::whereHas('roles', function ($query) {
            $query->where('name', 'Alumni');
        })->join('alumni', 'users.id_user', '=', 'alumni.id_user')
            ->orderBy('users.name', 'ASC')
            ->filter(request(['search']))
            ->get();
        $cekAlumni = Alumni::where('id_user', Auth::user()->id_user)->exists();
        return view('admin.dashboard', compact('alumni', 'name', 'cekAlumni'))->with('i');
    }

    public function dataAlumni(Request $request)
    {
        $name = $request->search;
        $angkatan = $request->angkatan;
        $alumni = User::whereHas('roles', function ($query) {
            $query->where('name', 'Alumni');
        })->join('alumni', 'users.id_user', '=', 'alumni.id_user')
            ->orderBy('users.name', 'ASC')
            ->filter(request(['search', 'angkatan']))
            ->get();
        return view('admin.alumni.index', compact('alumni', 'name', 'angkatan'))->with('i');
    }

    public function detailAlumni($id)
    {
        $title = 'Detail Alumni';
        $dataPribadi = Alumni::where('id_alumni', $id)->first();
        $dataPekerjaan = Pekerjaan::where('id_alumni', $dataPribadi->id_alumni)->get();
        $dataPendidikan = Pendidikan::where('id_alumni', $dataPribadi->id_alumni)->get();
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
            ->join('alumni', 'users.id_user', '=', 'alumni.id_user')
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
        $user = Alumni::where('id_user', $id_user)->first();
        $user->delete();


        return redirect()->back()->with(['message' => 'Permintaan Verifikasi Berhasil Ditolak']);
    }
}
