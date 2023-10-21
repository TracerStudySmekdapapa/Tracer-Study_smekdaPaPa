<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Pribadi;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home';
        return view('welcome', compact('title'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $tamatan = $request->tamatan;
        $title = 'Cari Alumni';
        if ($search || $tamatan) {
            $alumni = User::whereHas('roles', function ($query) {
                $query->where('name', 'Alumni');
            })->join('data_pribadi', 'users.id_user', '=', 'data_pribadi.id_user')
                ->orderBy('users.name', 'ASC')->filter(request(['search', 'tamatan']))->get();
            return view('pages.search', compact('alumni', 'title', 'search', 'tamatan'));
        }
        return view('pages.search', compact('title', 'search', 'tamatan'));
    }

    public function detail($id)
    {
        $title = 'Detail Alumni';
        $dataPribadi = Pribadi::where('id_pribadi', $id)->first();
        $dataPekerjaan = Pekerjaan::where('id_pribadi', $dataPribadi->id_pribadi)->get();
        $dataPendidikan = Pendidikan::where('id_pribadi', $dataPribadi->id_pribadi)->get();
        return view('pages.detail', compact('dataPribadi', 'dataPekerjaan', 'dataPendidikan', 'title'));
    }
}
