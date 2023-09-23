<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumniController extends Controller
{
    public function index(){
        
    }

    public function tambahDataPribadi(){
        return view('alumni.datapribadi.create');
    }

    public function simpanDataPribadi(Request $request,$id){
        $user = User::where('id_user', $id);
        Alumni::create([
            'nisn' => $request->nisn,
            'no_telp' => $request->no_telp,
            'tempat_lahir' => $request->tmp_lahir,
            'agama' => $request->agm,
            'jenis_kelamin' => $request->kelamin,
            'jurusan' => $request->jrsn,
            'id_user' => $id
        ]);

        $user->update([
            'profil_picture' => $request->profil
        ]);

        return redirect()->route('dashboard')->with(['message' => 'Data berhasil disimpan']);
    }
}
