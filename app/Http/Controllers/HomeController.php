<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $title = 'Home';
        return view('welcome', compact('title'));
    }

    public function search(Request $request){
        $search = $request->search;
        $title = 'Cari Alumni';
        if ($search) {
            $alumni = User::whereHas('roles', function ($query) {
                $query->where('name', 'Alumni');
            })->join('alumni', 'users.id_user', '=', 'alumni.id_user')
            ->orderBy('users.name', 'ASC')->filter(request(['search']))->get();
        return view('pages.search', compact('alumni', 'title', 'search'));
        }
    return view('pages.search', compact('title', 'search'));
    }

    public function detail($id){
        $title = 'Detail Alumni';
        $dataPribadi = Alumni::where('id_alumni', $id)->first();
        $dataPekerjaan = Pekerjaan::where('id_alumni', $dataPribadi->id_alumni)->get();
        $dataPendidikan = Pendidikan::where('id_alumni', $dataPribadi->id_alumni)->get();
        return view('alumni.detail', compact('dataPribadi', 'dataPekerjaan', 'dataPendidikan', 'title'));
    }
}