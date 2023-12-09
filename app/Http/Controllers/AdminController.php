<?php

namespace App\Http\Controllers;

use App\Exports\DataAlumniClass;
use App\Exports\DataAlumniExport;
use App\Exports\DataSurveiClass;
use App\Exports\FreshGraduateClass;
use App\Exports\PertanyaanSurveiClass;
use App\Http\Requests\DataPekerjaanUpdateRequest;
use App\Http\Requests\DataPendidikanUpdateRequest;
use App\Http\Requests\DataPribadiUpdateRequest;
use App\Models\JawabanSurvei;
use App\Models\Jurusan;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Pribadi;
use App\Models\Survei;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        $title = 'Dashboard Admin';
        $tidakAlumni = User::tidakAlumni()->limit(3)->get();
        $tolakAlumni = User::tolakAlumni()->limit(3)->get();
        $title_page = 'Selamat Datang, Admin';


        $alumniData = [
            'countPendidikan' => PendidikanController::alumniPendidikan(),
            'countPendidikanPertahun' => PendidikanController::alumniPendidikanPertahun(),
            'countPekerjaan' => PekerjaanController::alumniBekerja()->count(),
            'countPekerjaanPertahun' => PekerjaanController::alumniBekerjaPertahun(),
            'countAlumniPertahun' => PribadiController::alumniPertahun(),
            'countAlumni' => PribadiController::semuaAlumni(),
            'countAlumniMendaftar' => PribadiController::alumniMendaftar(),
            'countAlumniNganggur' => PribadiController::alumniTidakBekerjaDanTidakPendidikan(),
            'countAlumniFreshGraduate' => PribadiController::alumniFreshGraduate()->count(),
            'countAlumniSurvei' => User::Survei()->count()
        ];

        $freshGraduate = PribadiController::alumniFreshGraduate()->paginate(5);

        return view('admin.dashboard', compact('tidakAlumni', 'title', 'title_page', 'alumniData', 'freshGraduate', 'tolakAlumni'));
    }

    /* Start Data Alumni */
    public function dataAlumni(Request $request)
    {
        $search = $request->search;
        $status = $request->status;
        $title = 'Data Alumni';
        $title_page = 'Lihat Data Alumni';
        $tidakAlumni = User::tidakAlumni()->limit(3)->get();
        $tolakAlumni = User::tolakAlumni()->limit(3)->get();

        if ($search || $status) {
            $results = User::filter(request(['search', 'status', 'tamatan']))
                ->paginate(10);
            $countSearch = User::filter(request(['search', 'status', 'tamatan']))
                ->count();
            return view('admin.alumni.index', compact('tidakAlumni', 'results', 'search', 'status', 'title', 'title_page', 'countSearch', 'tolakAlumni'));
        }

        // dd(User::DataAlumni()->get());
        $alumni = User::DataAlumni()->paginate(10)->withQueryString();
        $alumniCount = User::DataAlumni()->get()->count();
        return view('admin.alumni.index', compact('alumni', 'tidakAlumni', 'search', 'status', 'title', 'title_page', 'alumniCount', 'tolakAlumni'));
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

    /* Start Users */

    public function users()
    {
        $title = 'Data Users';
        $tidakAlumni = User::tidakAlumni()->limit(3)->get();
        $tolakAlumni = User::tolakAlumni()->limit(3)->get();
        $title_page = 'Data Users';

        $data = User::paginate(10);
        $dataCount = User::get()->count();

        return view('admin.users.index', compact('tidakAlumni', 'title', 'title_page', 'tolakAlumni', 'data', 'dataCount'));
    }

    public function editUsers($id)
    {
        $title = 'Edit Data Users';
        $title_page = 'Edit Data Users';
        $tidakAlumni = User::tidakAlumni()->limit(3)->get();
        $tolakAlumni = User::tolakAlumni()->limit(3)->get();
        $data = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $data->roles->pluck('name', 'name')->all();

        return view('admin.users.edit', compact('title', 'title_page', 'data', 'tidakAlumni', 'tolakAlumni', 'roles', 'userRole'));
    }

    public function updateUsers(Request $request, $id_user)
    {
        $data = User::where('id_user', $id_user)->first();

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'nullable',
            'roles' => 'required'
        ]);

        if ($validatedData) {
            $data->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            if ($request->filled('password')) {
                // Encrypt new password
                $data->password = Hash::make($request->password);
                $data->save();
            }
            DB::table('model_has_roles')->where('model_id',$id_user)->delete();
    
            $user->assignRole($request->input('roles'));

            return redirect()->route('users', $id_user)->with(['message' => 'Data berhasil diubah']);
        } else {
            return redirect()->back()->withErrors($validatedData)->withInput($request->all());
        }
    }

    public function destroyUsers($id_user)
    {
        $user = User::where('id_user', $id_user)->first();
        $user->delete();

        return redirect()->route('users', compact('user'));
    }

    /* End Users */


    public function verifAlumni()
    {
        $tidakAlumni = User::tidakAlumni()->leftJoin('jurusan', 'data_pribadi.id_jurusan', '=', 'jurusan.id_jurusan')
            ->get();
        $tolakAlumni = User::tolakAlumni()->limit(3)->get();

        $title = "Verifikasi Data Alumni";
        $title_page = "Verifikasi Data Alumni";
        return view('admin.verifalumni.index', compact('tidakAlumni', 'title', 'title_page', 'tolakAlumni'));
    }

    public function verifAlumniAksi($id_user)
    {
        $user = User::where('id_user', $id_user)->first();
        if ($user->hasRole('TolakAlumni')) {
            DB::table('model_has_roles')->where('model_id', $id_user)->delete();
            $user->assignRole('Alumni');
        }
        $user->assignRole('Alumni');

        return redirect()->back()->with(['message' => 'Permintaan Verifikasi Berhasil']);
    }

    public function tolakVerifAlumniAksi($id_user)
    {
        $user = User::where('id_user', $id_user)->first();
        $user->assignRole('TolakAlumni');


        return redirect()->back()->with(['message' => 'Permintaan Verifikasi Berhasil Ditolak']);
    }

    public function hapusVerifAlumniAksi($id_user)
    {
        $user = User::where('id_user', $id_user)->first();
        $user->delete();

        return redirect()->back()->with(['message' => 'Permintaan Verifikasi Berhasil Ditolak']);
    }

    public function exportFreshGraduate()
    {
        return Excel::download(new FreshGraduateClass, 'fresh_graduate.xlsx');
    }

    public function exportDataAlumni()
    {
        return Excel::download(new DataAlumniClass, 'data_alumn.xlsx');
    }

    public function exportPertanyaanSurvei()
    {
        // $data = Survei::get();
        // return view('tabel.survei', compact('data'));
        return Excel::download(new PertanyaanSurveiClass, 'pertanyaan_survei.xlsx');
    }

    public function exportDataSurvei()
    {
        return Excel::download(new DataSurveiClass, 'data_survei.xlsx');
    }
}
