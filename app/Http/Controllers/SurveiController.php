<?php

namespace App\Http\Controllers;

use App\Http\Requests\SimpanSurveiRequest;
use App\Models\JawabanSurvei;
use App\Models\Survei;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveiController extends Controller
{

    public function index()
    {
        $title = 'Pertanyaan Survei';
        $title_page = 'Pertanyaan Survei';
        $tidakAlumni = User::tidakAlumni()->limit(3)->get();
        $data = Survei::get();
        return view('admin.survei.index', compact('title', 'tidakAlumni', 'title_page', 'data'));
    }

    public function createSurvei()
    {
        $title = 'Tambah Pertanyaan Survei';
        $title_page = 'Tambah Pertanyaan Survei';
        $tidakAlumni = User::tidakAlumni()->limit(3)->get();
        return view('admin.survei.create', compact('title', 'tidakAlumni', 'title_page'));
    }

    public function simpanSurvei(SimpanSurveiRequest $request)
    {
        /* Start Validasi */
        $validatedData = $request->validated();
        /* End Validasi */

        if ($validatedData) {
            Survei::create([
                'pertanyaan' => $request->nama_pertanyaan
            ]);
            return redirect()->route('survei')->with(['message' => 'Data berhasil disimpan']);
        } else {
            return redirect()->back()->withErrors($validatedData)->withInput($request->all());
        }
    }

    public function editSurvei($id)
    {
        $survei = Survei::find($id);
        $title = 'Edit Pertanyaan Survei';
        $title_page = 'Edit Pertanyaan Survei';
        $tidakAlumni = User::tidakAlumni()->limit(3)->get();
        // $survei = Survei::get();
        return view('admin.survei.edit', compact('survei', 'title', 'title_page', 'tidakAlumni'));
    }


    public function updateSurvei(Request $request, $id)
    {
        $survei = Survei::find($id);
        $survei->update($request->all());

        return redirect()->route('survei', compact('survei'));
    }

    public function destroySurvei($id){
        $survei = Survei::find($id);
        $survei->delete();

        return redirect()->route('survei',compact('survei'));
    }

    public function dataSurvei()
    {
        $title = 'Data Survei';
        $title_page = 'Data Survei';
        $tidakAlumni = User::tidakAlumni()->limit(3)->get();
        $data = User::Survei()->get();
        return view('admin.survei.data', compact('title', 'tidakAlumni', 'title_page', 'data'));
    }

    public function tambah()
    {
        $title = 'Survei';
        $data = Survei::get();
        return view('alumni.survei.create', compact('title', 'data'));
    }

    public function simpan(Request $request)
    {
        // dd($request->jawaban);
        foreach ($request->jawaban as $id_pertanyaan => $jawaban) {
            JawabanSurvei::create([
                'id_pertanyaan' => $id_pertanyaan,
                'id_user' => Auth::user()->id_user,
                'jawaban' => $jawaban,
            ]);
        }

        return redirect()->route('dashboard')->with('message', 'Survei Telah Diisi');
    }

    public function detail($id)
    {
        $title = 'Data Survei';
        $title_page = 'Data Survei';
        $data = JawabanSurvei::where('id_user', $id)->get();
        return view('admin.survei.detail', compact('title', 'title_page', 'data'));
    }
}
