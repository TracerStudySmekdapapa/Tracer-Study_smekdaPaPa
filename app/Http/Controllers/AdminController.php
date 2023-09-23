<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Pekerjaan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dataAlumni()
    {
        $alumni = Alumni::get();
        return view('admin.alumni.index', compact('alumni'))->with('i');
    }

    public function dataPekerjaan()
    {
        $pekerjaan = Pekerjaan::get();
        return view('admin.pekerjaan.index', compact('pekerjaan'))->with('i');
    }

    public function verifAlumni()
    {
        $user = User::whereDoesntHave('roles', function ($query) {
            $query->whereIn('name', ['Alumni', 'Admin']);
        })->get();
        return view('admin.verifalumni.index', compact('user'))->with('i');
    }

    public function verifAlumniAksi(Request $request)
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
