<?php

namespace App\Http\Controllers;

use App\Models\JawabanSurvei;
use App\Models\Survei;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveiController extends Controller
{

    public function index()
    {
        $title = 'Survei';
        $title_page = 'Survei';
        $tidakAlumni = User::tidakAlumni()->limit(3)->get();
        $data = Survei::get();
        return view('admin.survei.index', compact('title', 'tidakAlumni', 'title_page', 'data'));
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
