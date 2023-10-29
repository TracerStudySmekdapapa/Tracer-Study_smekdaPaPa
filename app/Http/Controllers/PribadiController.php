<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataPekerjaanSimpanRequest;
use App\Http\Requests\DataPekerjaanUpdateRequest;
use App\Http\Requests\DataPendidikanSimpanRequest;
use App\Http\Requests\DataPendidikanUpdateRequest;
use App\Http\Requests\DataPribadiSimpanRequest;
use App\Http\Requests\DataPribadiUpdateRequest;
use App\Models\Jurusan;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Pribadi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $agama = [
            'Islam',
            'Kristen',
            'Hindu',
            'Buddha',
            'Konghucu',
            'Lainnya'
        ];
        return view('alumni.datapribadi.create', compact('title', 'jurusan', 'agama'));
    }

    public function simpanDataPribadi(DataPribadiSimpanRequest $request, $id)
    {
        /* Start Validasi */
        $validatedData = $request->validated();
        /* End Validasi */

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
        $agama = [
            'Islam',
            'Kristen',
            'Hindu',
            'Buddha',
            'Konghucu',
            'Lainnya'
        ];
        return view('alumni.datapribadi.edit', compact('data', 'title', 'jurusan', 'agama'));
    }

    public function updateDataPribadi(DataPribadiUpdateRequest $request, $id)
    {
        $alumni = Pribadi::where('id_user', $id)->first();
        // dd($alumni);
        /* Start Validasi */
        $validatedData = $request->validated();
        /* End Validasi */

        if ($validatedData) {
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
        } else {
            return redirect()->back()->withErrors($validatedData)->withInput($request->all());
        }
    }
    /* End Edit Data Pekerjaan */

    /* Start Create Data Pekerjaan */
    public function tambahDataPekerjaan()
    {
        $title = 'Tambah Data Pekerjaan';
        return view('alumni.datapekerjaan.create', compact('title'));
    }

    public function simpanDataPekerjaan(DataPekerjaanSimpanRequest $request, $id)
    {
        $id_pribadi = Pribadi::where('id_user', $id)->first();

        /* Start Validasi */
        $validatedData = $request->validated();
        /* End Validasi */

        if ($validatedData) {
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
        } else {
            return redirect()->back()->withErrors($validatedData)->withInput($request->all());
        }
    }

    public function editDataPekerjaan($id)
    {
        $title = 'Edit Data Pekerjaan';
        $data = Pekerjaan::where('id_pekerjaan', $id)->first();
        return view('alumni.datapekerjaan.edit', compact('title', 'data'));
    }

    public function updateDataPekerjaan(DataPekerjaanUpdateRequest $request, $id)
    {
        $data = Pekerjaan::where('id_pekerjaan', $id)->first();

        /* Start Validasi */
        $validatedData = $request->validated();
        /* End Validasi */

        if ($validatedData) {
            $data->update([
                'nama_pekerjaan' => $request->nama_pekerjaan,
                'nama_instansi' => $request->nama_instansi,
                'jabatan' => $request->jabatan,
                'thn_masuk' => $request->tahun_masuk,
                'thn_keluar' => $request->tahun_keluar,
                'alamat_instansi' => $request->alamat,
            ]);

            return redirect()->route('alumniDashboard')->with(['message' => 'Data berhasil diubah']);
        } else {
            return redirect()->back()->withErrors($validatedData)->withInput($request->all());
        }
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

    public function simpanDataPendidikan(DataPendidikanSimpanRequest $request, $id)
    {
        $id_pribadi = Pribadi::where('id_user', $id)->first();

        /* Start Validasi */
        $validatedData = $request->validated();
        /* End Validasi */

        if ($validatedData) {
            Pendidikan::create([
                'nama_univ' => $request->nama_univ,
                'fakultas' => $request->fakultas,
                'prodi' => $request->prodi,
                'alamat_univ' => $request->alamat_univ,
                'id_pribadi' => $id_pribadi->id_pribadi
            ]);

            return redirect()->route('alumniDashboard')->with(['message' => 'Data berhasil disimpan']);
        } else {
            return redirect()->back()->withErrors($validatedData)->withInput($request->all());
        }
    }

    public function editDataPendidikan($id)
    {
        $title = 'Edit Data Pendidikan';
        $data = Pendidikan::where('id_pendidikan', $id)->first();
        return view('alumni.datapendidikan.edit', compact('title', 'data'));
    }

    public function updateDataPendidikan(DataPendidikanUpdateRequest $request, $id)
    {
        $data = Pendidikan::where('id_pendidikan', $id)->first();

        /* Start Validasi */
        $validatedData = $request->validated();
        /* End Validasi */

        if ($validatedData) {
            $data->update([
                'nama_univ' => $request->nama_univ,
                'fakultas' => $request->fakultas,
                'prodi' => $request->prodi,
                'alamat_univ' => $request->alamat_univ,
            ]);

            return redirect()->route('alumniDashboard')->with(['message' => 'Data berhasil diubah']);
        } else {
            return redirect()->back()->withErrors($validatedData)->withInput($request->all());
        }
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

    /* Start Count */
    public static function alumniMendaftar()
    {
        $user = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'Admin');
        })->count();

        return $user;
    }

    public static function alumniTidakBekerjaDanTidakPendidikan()
    {
        $alumniCount = User::whereHas('roles', function ($query) {
            $query->where('name', 'Alumni');
        })->join('data_pribadi', 'users.id_user', '=', 'data_pribadi.id_user')
            ->leftJoin(DB::raw("(SELECT id_pribadi, COUNT(DISTINCT id_pekerjaan) as total_pekerjaan FROM pekerjaan GROUP BY id_pribadi) as pekerjaan"), 'data_pribadi.id_pribadi', '=', 'pekerjaan.id_pribadi')
            ->leftJoin(DB::raw("(SELECT id_pribadi, COUNT(DISTINCT id_pendidikan) as total_pendidikan FROM pendidikan GROUP BY id_pribadi) as pendidikan"), 'data_pribadi.id_pribadi', '=', 'pendidikan.id_pribadi')
            ->where(function ($query) {
                $query->whereNull('pekerjaan.total_pekerjaan')->orWhere('pekerjaan.total_pekerjaan', '=', 0);
            })
            ->where(function ($query) {
                $query->whereNull('pendidikan.total_pendidikan')->orWhere('pendidikan.total_pendidikan', '=', 0);
            })
            ->count();

        return $alumniCount;
    }


    public static function semuaAlumni()
    {
        $user = User::whereHas('roles', function ($query) {
            $query->where('name', 'Alumni');
        })->count();

        return $user;
    }

    public static function alumniPertahun()
    {
        $data = [];

        for ($tahun = 2006; $tahun <= Carbon::now()->year; $tahun++) {
            $alumniCount = User::whereHas('roles', function ($query) {
                $query->where('name', 'Alumni');
            })->join(
                'data_pribadi',
                'users.id_user',
                '=',
                'data_pribadi.id_user'
            )
                ->where('data_pribadi.tamatan', $tahun)
                ->count();

            $data[$tahun] = $alumniCount;
        }
        return $data;
    }
    /* End Count */
}
