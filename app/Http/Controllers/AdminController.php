<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function verifAlumni()
    {
        // $users = User::whereNotIn('name', ['admin'])->get();
        // dd($user->withRole('Alumni')->get());
        $user = User::whereDoesntHave('roles', function ($query) {
            $query->whereIn('name', ['Alumni', 'Admin']);
        })->get();
        // $user = User::role('!Alumni')->get();
        // dd($usersWithRole);
        return view('verifalumni.index', compact('user'))->with('i');
    }

    public function verifAlumniAksi(Request $request)
    {
        $user = User::where('id_user', $request->id_user)->first();
        // dd($user);
        $user->assignRole('Alumni');

        if ($user->hasRole('Alumni')) {
            return redirect()->to('/dashboard')->with(['message' => 'Selamat datang Alumni']);
        } else {
            return redirect()->to('/dashboard');
        }
    }
}
