<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataPribadiSimpanRequest;
use App\Models\Jurusan;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Pribadi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PribadiController extends Controller
{
    public function index()
    {
        $title = 'Alumni Dashboard';
        /* $alumni = Pribadi::get();
        foreach($alumni as $data){
            foreach ($data->pekerjaan as $item) {
                $item->nama_pekerjaan;
            } 
        } */
        $alumni = Pribadi::where('id_user', Auth::user()->id_user)->first();
        if ($alumni) {
            $pekerjaan = Pekerjaan::where('id_pribadi', $alumni->id_pribadi)->orderBy('created_at', 'DESC')->limit(3)->get();
            $pendidikan = Pendidikan::where('id_pribadi', $alumni->id_pribadi)->orderBy('created_at', 'DESC')->limit(3)->get();
            return view('alumni.dashboard', compact('title', 'pekerjaan', 'alumni', 'pendidikan'));
        } else {
            return view('alumni.dashboard', compact('title', 'alumni'));
        }
    }

    /* Start Detail Alumi */
    public function detail($id)
    {
        $title = 'Detail Alumni';
        $dataPribadi = Pribadi::where('id_pribadi', $id)->first();
        $dataPekerjaan = Pekerjaan::where('id_pribadi', $dataPribadi->id_pribadi)->get();
        $dataPendidikan = Pendidikan::where('id_pribadi', $dataPribadi->id_pribadi)->get();
        return view('alumni.detail', compact('dataPribadi', 'dataPekerjaan', 'dataPendidikan', 'title'));
    }
    /* End Detail Alumi */

    /* Start Create Data Pribadi */
    public function tambahDataPribadi()
    {
        $title = 'Tambah Data Pribadi';
        $jurusan = Jurusan::get();
        return view('alumni.datapribadi.create', compact('title', 'jurusan'));
    }

    public function simpanDataPribadi(DataPribadiSimpanRequest $request, $id)
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


        $validatedData = $request->validated();
        if ($validatedData) {
            Pribadi::create([
                'nisn' => $request->nisn,
                'no_telp' => $request->no_telp,
                'tempat_lahir' => $request->tmp_lahir,
                'tanggal_lahir' => $request->tgl_lahir,
                'agama' => $request->agama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tamatan' => $request->tamatan,
                'id_jurusan' => $request->jurusan,
                'id_user' => $id
            ]);

            return redirect()->route('alumniDashboard')->with(['message' => 'Data berhasil disimpan']);
        } else {
            return redirect()->back()->withErrors($validatedData)->withInput($request->all());
        }
    }
    /* End Create Data Pribadi */

    /* Start Edit Data Pekerjaan */
    public function editDataPribadi($id)
    {
        $title = 'Edit Data Pribadi';
        $data = Pribadi::where('id_user', $id)->first();
        $jurusan = Jurusan::get();
        return view('alumni.datapribadi.edit', compact('data', 'title', 'jurusan'));
    }

    public function updateDataPribadi(Request $request, $id)
    {
        $alumni = Pribadi::where('id_user', $id)->first();
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
            'tamatan' => $request->tamatan,
            'id_jurusan' => $request->jurusan,
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
        $id_pribadi = Pribadi::where('id_user', $id)->first();
        Pekerjaan::create([
            'nama_pekerjaan' => $request->nama_pekerjaan,
            'nama_instansi' => $request->nama_instansi,
            'alamat_instansi' => $request->alamat,
            'jabatan' => $request->jabatan,
            'thn_masuk' => $request->tahun_masuk,
            'thn_keluar' => $request->tahun_keluar,
            'id_pribadi' => $id_pribadi->id_pribadi
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

        return redirect()->route('alumniDashboard')->with(['message' => 'Data berhasil diubah']);
    }

    public function detailDataPekerjaan($id)
    {
        $pekerjaan = Pekerjaan::get()->where('id_pribadi', $id);
        $title = 'data pekerjaan';
        return view('alumni.datapekerjaan.detail', compact('title', 'pekerjaan'));
    }

    public function deleteDataPekerjaan($id)
    {
        $pengaduan = Pekerjaan::where('id_pekerjaan', $id)->first();
        $pengaduan->delete();
        return redirect()->route('alumniDashboard')->with('message', 'Pengaduan Berhasil Dihapus!');
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
        $id_pribadi = Pribadi::where('id_user', $id)->first();
        Pendidikan::create([
            'nama_univ' => $request->nama_univ,
            'fakultas' => $request->fakultas,
            'prodi' => $request->prodi,
            'alamat_univ' => $request->alamat_univ,
            'id_pribadi' => $id_pribadi->id_pribadi
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

        return redirect()->route('alumniDashboard')->with(['message' => 'Data berhasil diubah']);
    }

    public function detailDataPendidikan($id)
    {
        $pendidikan = Pendidikan::get()->where('id_pribadi', $id);
        $title = 'data pendidikan';

        return view('alumni.datapendidikan.detail', compact('title', 'pendidikan'));
    }

    public function deleteDataPendidikan($id)
    {
        $pengaduan = Pendidikan::where('id_pendidikan', $id)->first();
        $pengaduan->delete();
        return redirect()->route('alumniDashboard')->with('message', 'Data Berhasil Dihapus!');
    }
    /* End Create Data Pekerjaan */
}
