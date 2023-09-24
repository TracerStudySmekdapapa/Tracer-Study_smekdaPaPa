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
        // $alumni = Alumni::get();
        $users = User::role('Alumni')->get();
        return view('admin.alumni.index', compact('users'))->with('i');
    }

    public function detailAlumni($id)
    {
        $dataPribadi = Alumni::where('id_alumni', $id)->first();

        $dataPekerjaan = Pekerjaan::where('id_alumni', $dataPribadi->id_alumni)->first();
        return view('admin.alumni.detail', compact('dataPribadi', 'dataPekerjaan'));
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

        Alumni::create([
            'id_user' => $user->id_user
        ]);

        if ($user->hasRole('Alumni')) {
            return redirect()->to('/dashboard')->with(['message' => 'Selamat datang Alumni']);
        } else {
            return redirect()->to('/dashboard');
        }
    }
}
