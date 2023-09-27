<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dataAlumni(Request $request)
    {
        $name = $request->search;
        $angkatan = $request->angkatan;
        /* $alumni = Alumni::join('users', 'alumni.id_user', '=', 'users.id_user')
            ->orderBy('users.name', 'ASC')->filter(request(['name', 'angkatan']))->get(); */
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
        $dataPribadi = Alumni::where('id_alumni', $id)->first();
        $dataPekerjaan = Pekerjaan::where('id_alumni', $dataPribadi->id_alumni)->get();
        $dataPendidikan = Pendidikan::where('id_alumni', $dataPribadi->id_alumni)->get();
        return view('admin.alumni.detail', compact('dataPribadi', 'dataPekerjaan','dataPendidikan'));
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

    public function verifAlumniAksi(Request $request, $a)
    { 
            $user = User::where('id_user', $request->id_user)->first();
            $user->assignRole('Alumni');
            
            if ($user->hasRole('Alumni')) {
                return redirect()->to('/dashboard')->with(['message' => 'Selamat datang Alumni']);
            } else {
                return redirect()->to('/dashboard');
            }
    }
}
