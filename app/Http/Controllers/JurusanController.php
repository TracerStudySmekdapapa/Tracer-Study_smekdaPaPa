<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    
    public function index()
    {
        $jurusan = Jurusan::get();
        $title = 'Data Jurusan';
        $title_page = 'Data Jurusan';
        $tidakAlumni = User::tidakAlumni()->limit(3)->get();
        return view('admin.jurusan.index', compact('jurusan', 'title', 'title_page', 'tidakAlumni'));
    }

    
    public function create()
    {
        $title = 'Create Jurusan';
        $title_page = 'Create Jurusan';
        $tidakAlumni = User::tidakAlumni()->limit(3)->get();
        return view('admin.jurusan.create', compact('title', 'title_page', 'tidakAlumni'));
    }

  
    public function store(Request $request)
    {
        Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
        ]);

        return redirect()->route('jurusan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


   
    public function edit($id)
    {
        $jurusan = Jurusan::find($id);
        $title = 'edit jurusan';
        $title_page = 'edit jurusan';
        $tidakAlumni = User::tidakAlumni()->limit(3)->get();
        return view('admin.jurusan.edit', compact('jurusan', 'title', 'title_page', 'tidakAlumni'));
    }

   
    public function update(Request $request, $id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->update($request->all());

        return redirect()->route('jurusan', compact('jurusan'));
    }

   
    public function destroy($id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->delete();

        return redirect()->route('jurusan', compact('jurusan'));
    }
}
