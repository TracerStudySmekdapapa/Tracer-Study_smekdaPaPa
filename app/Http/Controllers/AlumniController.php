<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumniController extends Controller
{
    public function index()
    {
        $title = 'Alumni Dashboard';
        /* $alumni = Alumni::get();
        foreach($alumni as $data){
            foreach ($data->pekerjaan as $item) {
                $item->nama_pekerjaan;
            } 
        } */
        $alumni = Alumni::where('id_user', Auth::user()->id_user)->first();
        if ($alumni) {
            $pekerjaan = Pekerjaan::where('id_alumni', $alumni->id_alumni)->orderBy('created_at', 'DESC')->limit(3)->get();
            $pendidikan = Pendidikan::where('id_alumni', $alumni->id_alumni)->orderBy('created_at', 'DESC')->limit(3)->get();
            return view('alumni.dashboard', compact('title', 'pekerjaan', 'alumni', 'pendidikan'));
        } else {
            return view('alumni.dashboard', compact('title', 'alumni'));
        }
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
        $title = 'Tambah Data Pribadi';
        return view('alumni.datapribadi.create', compact('title'));
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
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jurusan' => $request->jurusan,
            'tamatan' => $request->tamatan,
            'id_user' => $id
        ]);

        $user->update([
            'profil_picture' => $request->profil
        ]);

        return redirect()->route('alumniDashboard')->with(['message' => 'Data berhasil disimpan']);
    }
    /* End Create Data Pribadi */

    /* Start Edit Data Pekerjaan */
    public function editDataPribadi($id)
    {
        $title = 'Edit Data Pribadi';
        $data = Alumni::where('id_user', $id)->first();
        return view('alumni.datapribadi.edit', compact('data', 'title'));
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

        $alumni->update([
            'nisn' => $request->nisn,
            'no_telp' => $request->no_telp,
            'tempat_lahir' => $request->tmp_lahir,
            'tanggal_lahir' => $request->tgl_lahir,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jurusan' => $request->jurusan,
            'tamatan' => $request->tamatan,
            'id_user' => $id
        ]);
        return redirect()->route('alumniDashboard')->with(['message' => 'Data berhasil diubah']);
    }
    /* End Edit Data Pekerjaan */

    /* Start Create Data Pekerjaan */
    public function tambahDataPekerjaan()
    {
        $title = 'Tambah Data Pekerjaan';
        return view('alumni.datapekerjaan.create', compact('title'));
    }

    public function simpanDataPekerjaan(Request $request, $id)
    {
        $id_alumni = Alumni::where('id_user', $id)->first();
        Pekerjaan::create([
            'nama_pekerjaan' => $request->nama_pekerjaan,
            'nama_instansi' => $request->nama_instansi,
            'alamat_instansi' => $request->alamat,
            'jabatan' => $request->jabatan,
            'thn_masuk' => $request->tahun_masuk,
            'thn_keluar' => $request->tahun_keluar,
            'id_alumni' => $id_alumni->id_alumni
        ]);

        return redirect()->route('alumniDashboard')->with(['message' => 'Data berhasil disimpan']);
    }

    public function editDataPekerjaan($id)
    {
        $title = 'Edit Data Pekerjaan';
        $data = Pekerjaan::where('id_pekerjaan', $id)->first();
        return view('alumni.datapekerjaan.edit', compact('title', 'data'));
    }

    public function updateDataPekerjaan(Request $request, $id)
    {
        $data = Pekerjaan::where('id_pekerjaan', $id)->first();

        $data->update([
            'nama_pekerjaan' => $request->nama_pekerjaan,
            'nama_instansi' => $request->nama_instansi,
            'jabatan' => $request->jabatan,
            'thn_masuk' => $request->tahun_masuk,
            'thn_keluar' => $request->tahun_keluar,
            'alamat_instansi' => $request->alamat,
        ]);

        return redirect()->route('alumniDashboard')->with(['message' => 'Data berhasil disimpan']);
    }
    /* End Create Data Pekerjaan */

    /* Start Create Data Pendidikan */
    public function tambahDataPendidikan()
    {
        $title = 'Tambah Data Pendidikan';
        return view('alumni.datapendidikan.create', compact('title'));
    }

    public function simpanDataPendidikan(Request $request, $id)
    {
        $id_alumni = Alumni::where('id_user', $id)->first();
        Pendidikan::create([
            'nama_univ' => $request->nama_univ,
            'fakultas' => $request->fakultas,
            'prodi' => $request->prodi,
            'alamat_univ' => $request->alamat_univ,
            'id_alumni' => $id_alumni->id_alumni
        ]);

        return redirect()->route('alumniDashboard')->with(['message' => 'Data berhasil disimpan']);
    }

    public function editDataPendidikan($id)
    {
        $title = 'Edit Data Pendidikan';
        $data = Pendidikan::where('id_pendidikan', $id)->first();
        return view('alumni.datapendidikan.edit', compact('title', 'data'));
    }

    public function updateDataPendidikan(Request $request, $id)
    {
        $data = Pendidikan::where('id_pendidikan', $id)->first();
        $data->update([
            'nama_univ' => $request->nama_univ,
            'fakultas' => $request->fakultas,
            'prodi' => $request->prodi,
            'alamat_univ' => $request->alamat_univ,
        ]);
        return redirect()->back();
    }
    /* End Create Data Pekerjaan */
}
