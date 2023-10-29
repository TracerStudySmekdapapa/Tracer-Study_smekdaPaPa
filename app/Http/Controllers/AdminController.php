<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataPekerjaanUpdateRequest;
use App\Http\Requests\DataPendidikanUpdateRequest;
use App\Http\Requests\DataPribadiUpdateRequest;
use App\Models\Jurusan;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Pribadi;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        $title = 'Dashboard Admin';
        $tidakAlumni = User::whereDoesntHave('roles', function ($query) {
            $query->whereIn('name', ['Alumni', 'Admin']);
        })
            ->join('data_pribadi', 'users.id_user', '=', 'data_pribadi.id_user')
            ->orderBy('users.name', 'ASC')
            ->get();
        $title_page = 'Selamat Datang, Admin';
        $countPendidikan = PendidikanController::alumniPendidikan();
        $countPendidikanPertahun = PendidikanController::alumniPendidikanPertahun();
        $countPekerjaan = PekerjaanController::alumniBekerja();
        $countPekerjaanPertahun = PekerjaanController::alumniBekerjaPertahun();
        $countAlumniPertahun = PribadiController::alumniPertahun();
        $countAlumni = PribadiController::semuaAlumni();
        $countAlumniMendaftar = PribadiController::alumniMendaftar();
        $countAlumniNganggur = PribadiController::alumniTidakBekerjaDanTidakPendidikan();
        return view('admin.dashboard', compact('tidakAlumni', 'title', 'title_page', 'countAlumni', 'countPekerjaan', 'countPendidikan', 'countPendidikanPertahun', 'countAlumniPertahun', 'countAlumniNganggur', 'countAlumniMendaftar'));
    }

    /* Start Data Alumni */
    public function dataAlumni(Request $request)
    {
        $name = $request->search;
        $angkatan = $request->angkatan;
        $alumni = User::whereHas('roles', function ($query) {
            $query->where('name', 'Alumni');
        })
            ->join('data_pribadi', 'users.id_user', '=', 'data_pribadi.id_user')
            ->leftJoin('jurusan', 'data_pribadi.id_jurusan', '=', 'jurusan.id_jurusan')
            ->orderBy('users.name', 'ASC')
            ->filter(request(['search', 'angkatan']))
            ->get();


        $tidakAlumni = User::whereDoesntHave('roles', function ($query) {
            $query->whereIn('name', ['Alumni', 'Admin']);
        })
            ->join('data_pribadi', 'users.id_user', '=', 'data_pribadi.id_user')
            ->orderBy('users.name', 'ASC')
            ->get();

        $title = 'Data Alumni';
        $title_page = 'Lihat Data Alumni';
        return view('admin.alumni.index', compact('alumni', 'name', 'tidakAlumni', 'angkatan', 'title', 'title_page'));
    }

    public function detailAlumni($id)
    {
        $title = 'Detail Alumni';
        $dataPribadi = Pribadi::where('id_pribadi', $id)->first();
        $dataPekerjaan = Pekerjaan::where('id_pribadi', $dataPribadi->id_pribadi)->get();
        $dataPendidikan = Pendidikan::where('id_pribadi', $dataPribadi->id_pribadi)->get();
        return view('admin.alumni.detail', compact('dataPribadi', 'dataPekerjaan', 'dataPendidikan',  'title'));
    }

    public function editAlumniPribadi($id)
    {
        $title = 'Edit Data Pribadi';
        $data = Pribadi::where('id_pribadi', $id)->first();
        $jurusan = Jurusan::get();
        $agama = [
            'Islam',
            'Kristen',
            'Hindu',
            'Buddha',
            'Konghucu',
            'Lainnya'
        ];
        return view('admin.alumni.datapribadi.edit', compact('data', 'title', 'jurusan', 'agama'));
    }

    public function updateAlumniPribadi(DataPribadiUpdateRequest $request, $id_pribadi)
    {
        $alumni = Pribadi::where('id_pribadi', $id_pribadi)->first();
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
            ]);
            return redirect()->route('adminDetailAlumni', $id_pribadi)->with(['message' => 'Data berhasil diubah']);
        } else {
            return redirect()->back()->withErrors($validatedData)->withInput($request->all());
        }
    }

    public function editAlumniPekerjaan($id_pribadi, $id_pekerjaan)
    {
        $title = 'Edit Pekerjaan Alumni';
        $id_pribadi = Pribadi::where('id_pribadi', $id_pribadi)->first();
        $dataPekerjaan = Pekerjaan::where('id_pekerjaan', $id_pekerjaan)->first();
        return view('admin.alumni.datapekerjaan.edit', compact('dataPekerjaan', 'title', 'id_pribadi'));
    }

    public function updateAlumniPekerjaan(DataPekerjaanUpdateRequest $request, $id_pribadi, $id_pekerjaan)
    {
        $data = Pekerjaan::where('id_pekerjaan', $id_pekerjaan)->first();

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

            return redirect()->route('adminDetailAlumni', $id_pribadi)->with(['message' => 'Data berhasil diubah']);
        } else {
            return redirect()->back()->withErrors($validatedData)->withInput($request->all());
        }
    }

    public function editAlumniPendidikan($id_pribadi, $id_pendidikan)
    {
        $title = 'Edit Pendidikan Alumni';
        $id_pribadi = Pribadi::where('id_pribadi', $id_pribadi)->first();
        $dataPendidikan = Pendidikan::where('id_pendidikan', $id_pendidikan)->first();
        return view('admin.alumni.datapendidikan.edit', compact('dataPendidikan', 'title', 'id_pribadi'));
    }

    public function updateAlumniPendidikan(DataPendidikanUpdateRequest $request, $id_pribadi, $id_pendidikan)
    {
        $data = Pendidikan::where('id_pendidikan', $id_pendidikan)->first();

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

            return redirect()->route('adminDetailAlumni', $id_pribadi)->with(['message' => 'Data berhasil diubah']);
        } else {
            return redirect()->back()->withErrors($validatedData)->withInput($request->all());
        }
    }

    /* End Data Alumni */


    public function verifAlumni()
    {
        $tidakAlumni = User::whereDoesntHave('roles', function ($query) {
            $query->whereIn('name', ['Alumni', 'Admin']);
        })
            ->join('data_pribadi', 'users.id_user', '=', 'data_pribadi.id_user')
            ->leftJoin('jurusan', 'data_pribadi.id_jurusan', '=', 'jurusan.id_jurusan')
            ->orderBy('users.name', 'ASC')
            ->get();

        $title = "Verifikasi Data Alumni";
        $title_page = "Verifikasi Data Alumni";
        return view('admin.verifalumni.index', compact('tidakAlumni', 'title', 'title_page'));
    }

    public function verifAlumniAksi($id_user)
    {
        $user = User::where('id_user', $id_user)->first();
        $user->assignRole('Alumni');

        return redirect()->back()->with(['message' => 'Permintaan Verifikasi Berhasil']);
    }

    public function tolakVerifAlumniAksi($id_user)
    {
        $user = Pribadi::where('id_user', $id_user)->first();
        $user->delete();


        return redirect()->back()->with(['message' => 'Permintaan Verifikasi Berhasil Ditolak']);
    }
}
