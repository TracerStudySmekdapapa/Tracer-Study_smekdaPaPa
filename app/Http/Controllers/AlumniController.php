<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumniController extends Controller
{
    public function index()
    {
    }

    public function tambahDataPribadi($id)
    {
        $alumni = Alumni::where('id_user', $id)->first();
        return view('alumni.datapribadi.create', compact('alumni'));
    }

    public function simpanDataPribadi(Request $request, $id)
    {
        $alumni = Alumni::where('id_user', $id);
        $user = User::where('id_user', $id);
        $alumni->update([
            'nisn' => $request->nisn,
            'no_telp' => $request->no_telp,
            'tempat_lahir' => $request->tmp_lahir,
            'tanggal_lahir' => $request->tgl_lahir,
            'agama' => $request->agm,
            'jenis_kelamin' => $request->kelamin,
            'jurusan' => $request->jrsn,
            'angkatan' => $request->angkatan,
            'id_user' => $id
        ]);

        $user->update([
            'profil_picture' => $request->profil
        ]);

        return redirect()->route('dashboard')->with(['message' => 'Data berhasil disimpan']);
    }

    public function tambahDataPekerjaan()
    {
        return view('alumni.datapekerjaan.create');
    }

    public function simpanDataPekerjaan(Request $request, $id)
    {
        $id_alumni = Alumni::where('id_user', $id)->first();
        Pekerjaan::create([
            'nama_pekerjaan' => $request->nama_pekerjaan,
            'nama_instansi' => $request->nama_instansi,
            'alamat_instansi' => $request->alm_instansi,
            'jabatan' => $request->jbt,
            'id_alumni' => $id_alumni->id_alumni
        ]);

        return redirect()->route('dashboard')->with(['message' => 'Data berhasil disimpan']);
    }

    public function tambahDataPendidikan()
    {

        return view('alumni.datapendidikan.create');
    }
    public function simpanDataPendidikan(Request $request, $id)
    {
        $id_alumni = Alumni::where('id_user', $id)->first();
        Pendidikan::create([
            'nama_univ' => $request->nama_univ,
            'fakultas' => $request->fakultas,
            'prodi' => $request->prodi,
            'alamat_univ' => $request->alm_univ,
            'id_alumni' => $id_alumni->id_alumni
        ]);

        return redirect()->route('dashboard')->with(['message' => 'Data berhasil disimpan']);
    }
}
