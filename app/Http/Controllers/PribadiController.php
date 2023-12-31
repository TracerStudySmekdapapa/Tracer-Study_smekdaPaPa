<?php

namespace App\Http\Controllers;

use App\Helpers\EncryptionHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\DataPekerjaanSimpanRequest;
use App\Http\Requests\DataPekerjaanUpdateRequest;
use App\Http\Requests\DataPendidikanSimpanRequest;
use App\Http\Requests\DataPendidikanUpdateRequest;
use App\Http\Requests\DataPribadiSimpanRequest;
use App\Http\Requests\DataPribadiUpdateRequest;
use App\Models\JawabanSurvei;
use App\Models\Jurusan;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Pribadi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PribadiController extends Controller
{
    public function index()
    {
        $title = auth()->user()->hasRole('Alumni') ? 'Dashboard Alumni' : 'Dashboard';
        $alumni = Pribadi::where('id_user', Auth::user()->id_user)->first();
        $survei = JawabanSurvei::where('id_user', Auth::user()->id_user)->exists();
        // dd($survei);
        if ($alumni) {
            $pekerjaan = Pekerjaan::where('id_pribadi', $alumni->id_pribadi)->orderBy('created_at', 'DESC')->limit(3)->get();
            $pendidikan = Pendidikan::where('id_pribadi', $alumni->id_pribadi)->orderBy('created_at', 'DESC')->limit(3)->get();
            return view('alumni.dashboard', compact('title', 'pekerjaan', 'alumni', 'pendidikan', 'survei'));
        } else {
            return view('alumni.dashboard', compact('title', 'alumni',));
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
        $agama = ['Islam', 'Kristen', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya'];
        return view('alumni.datapribadi.create', compact('title', 'jurusan', 'agama'));
    }

    public function simpanDataPribadi(DataPribadiSimpanRequest $request, $id)
    {
        /* Start Validasi */
        $validatedData = $request->validated();
        /* End Validasi */

        $user = User::where('id_user', $id)->first();
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

            if ($request->jenis_kelamin == "Laki-Laki") {
                $user->update([
                    'profil_picture' => 'laki_' . random_int(5, 10) . '.webp'
                ]);
            }
            if ($request->jenis_kelamin == "Perempuan") {
                $user->update([
                    'profil_picture' => 'cewe_' . random_int(1, 5) . '.webp'
                ]);
            }

            return redirect()->route('dashboard')->with(['message' => 'Data berhasil disimpan']);
        } else {
            return redirect()->back()->withErrors($validatedData)->withInput($request->all());
        }
    }
    /* End Create Data Pribadi */

    /* Start Edit Data Pekerjaan */
    public function editDataPribadi($data)
    {
        $title = 'Edit Data Pribadi';
        try {
            $id = EncryptionHelpers::decrypt($data);
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
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            return redirect()->back()->with('error', 'Maaf');
        }
    }

    public function updateDataPribadi(DataPribadiUpdateRequest $request, $id)
    {
        $alumni = Pribadi::where('id_user', $id)->first();
        $user = User::where('id_user', $id)->first();

        /* Start Validasi */
        $validatedData = $request->validated();
        /* End Validasi */
        if ($validatedData) {

            if ($alumni->jenis_kelamin === null) {
                if ($request->jenis_kelamin == "Laki-Laki") {
                    $user->update([
                        'profil_picture' => 'laki_' . random_int(6, 10) . '.webp'
                    ]);
                }
                if ($request->jenis_kelamin == "Perempuan") {
                    $user->update([
                        'profil_picture' => 'cewe_' . random_int(1, 5) . '.webp'
                    ]);
                }
            }

            if ($request->jenis_kelamin == "Laki-Laki") {
                if ($alumni->jenis_kelamin != $request->jenis_kelamin) {
                    $user->update([
                        'profil_picture' => 'laki_' . random_int(6, 10) . '.webp'
                    ]);
                }
            }

            if ($request->jenis_kelamin == "Perempuan") {
                $profile = $alumni->jenis_kelamin != $request->jenis_kelamin;
                if ($profile) {
                    $user->update([
                        'profil_picture' => 'cewe_' . random_int(1, 5) . '.webp'
                    ]);
                }
            }

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




            return redirect()->route('dashboard')->with(['message' => 'Data berhasil diubah']);
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

            return redirect()->route('dashboard')->with(['message' => 'Data berhasil disimpan']);
        } else {
            return redirect()->back()->withErrors($validatedData)->withInput($request->all());
        }
    }

    public function editDataPekerjaan($id)
    {
        $title = 'Edit Data Pekerjaan';
        $data = Pekerjaan::where('id_pekerjaan', $id)->first();
        $this->authorize('edit', $data);
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

            return redirect()->route('dashboard')->with(['message' => 'Data berhasil diubah']);
        } else {
            return redirect()->back()->withErrors($validatedData)->withInput($request->all());
        }
    }

    public function detailDataPekerjaan($id)
    {
        $pekerjaan = Pekerjaan::with('pribadi')->where('id_pribadi', $id)->get();
        $this->authorize('show', $pekerjaan->first());
        $title = 'data pekerjaan';
        return view('alumni.datapekerjaan.detail', compact('title', 'pekerjaan'));
    }

    public function deleteDataPekerjaan($id)
    {
        $pengaduan = Pekerjaan::where('id_pekerjaan', $id)->first();
        $pengaduan->delete();
        return redirect()->route('dashboard')->with('message', 'Data Berhasil Dihapus!');
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

            return redirect()->route('dashboard')->with(['message' => 'Data berhasil disimpan']);
        } else {
            return redirect()->back()->withErrors($validatedData)->withInput($request->all());
        }
    }

    public function editDataPendidikan($id)
    {
        $title = 'Edit Data Pendidikan';
        $data = Pendidikan::where('id_pendidikan', $id)->first();
        $this->authorize('edit', $data);
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

            return redirect()->route('dashboard')->with(['message' => 'Data berhasil diubah']);
        } else {
            return redirect()->back()->withErrors($validatedData)->withInput($request->all());
        }
    }

    public function detailDataPendidikan($id)
    {
        $pendidikan = Pendidikan::where('id_pribadi', $id)->get();
        $this->authorize('show', $pendidikan->first());
        $title = 'data pendidikan';

        return view('alumni.datapendidikan.detail', compact('title', 'pendidikan'));
    }

    public function deleteDataPendidikan($id)
    {
        $pengaduan = Pendidikan::where('id_pendidikan', $id)->first();
        $pengaduan->delete();
        return redirect()->route('dashboard')->with('message', 'Data Berhasil Dihapus!');
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

    public static function alumniFreshGraduate()
    {
        $alumniCount = User::whereHas('roles', function ($query) {
            $query->where('name', 'Alumni');
        })->join(
            'data_pribadi',
            'users.id_user',
            '=',
            'data_pribadi.id_user'
        )->leftJoin('jurusan', 'data_pribadi.id_jurusan', '=', 'jurusan.id_jurusan')
            ->where('data_pribadi.tamatan', Carbon::now()->year - 1);

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
