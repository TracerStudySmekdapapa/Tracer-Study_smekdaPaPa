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
        $title = 'Alumni Dashboard';
        $alumni = Alumni::where('id_user', Auth::user()->id_user)->first();
        // dd($alumni);
        $pekerjaan = Pekerjaan::where('id_alumni', $alumni->id_alumni);
        return view('alumni.dashboard', compact('title', 'pekerjaan', 'alumni'));
    }

    /* Start Detail Alumi */
    public function detail($id)
    {
        $title = 'Detail Alumni';
        $dataPribadi = Alumni::where('id_alumni', $id)->first();
        $dataPekerjaan = Pekerjaan::where('id_alumni', $dataPribadi->id_alumni)->get();
        $dataPendidikan = Pendidikan::where('id_alumni', $dataPribadi->id_alumni)->get();
        return view('alumni.detail', compact('dataPribadi', 'dataPekerjaan', 'dataPendidikan', 'title'));
    }
    /* End Detail Alumi */

    /* Start Create Data Pribadi */
    public function tambahDataPribadi()
    {
        return view('alumni.datapribadi.create');
    }

    public function simpanDataPribadi(Request $request, $id)
    {
        /* Start Validasi */
        /*  $messages = [
            'nisn.unique' => 'NISN sudah digunakan sebelumnya',
            'nisn.min' => 'NISN harus memiliki setidaknya 10 karakter.'
        ];

        $request->validate([
            'nisn' => 'min:10|unique:alumni'
        ], $messages); */
        /* End Validasi */

        $user = User::where('id_user', $id);
        Alumni::create([
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

        return redirect()->route('adminDashboard')->with(['message' => 'Data berhasil disimpan']);
    }
    /* End Create Data Pribadi */

    /* Start Edit Data Pekerjaan */
    public function editDataPribadi($id)
    {
        $data = Alumni::where('id_user', $id)->first();
        return view('alumni.datapribadi.edit', compact('data'));
    }

    public function updateDataPribadi(Request $request, $id)
    {
        $alumni = Alumni::where('id_user', $id)->first();
        /* Start Validasi */
        /*  $messages = [
            'nisn.unique' => 'NISN sudah digunakan sebelumnya',
            'nisn.min' => 'NISN harus memiliki setidaknya 10 karakter.'
        ];
        $request->validate([
            'nisn' => 'min:10' . ($alumni->nisn == $request->nisn ? '' : '|unique:alumni,nisn')
        ], $messages); */
        /* End Validasi */

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

        return redirect()->route('adminDashboard')->with(['message' => 'Data berhasil diubah']);
    }
    /* End Edit Data Pekerjaan */

    /* Start Create Data Pekerjaan */
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

        return redirect()->route('adminDashboard')->with(['message' => 'Data berhasil disimpan']);
    }
    /* End Create Data Pekerjaan */

    /* Start Create Data Pendidikan */
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

        return redirect()->route('adminDashboard')->with(['message' => 'Data berhasil disimpan']);
    }
    /* End Create Data Pekerjaan */
}
