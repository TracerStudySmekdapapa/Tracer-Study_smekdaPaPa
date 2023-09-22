<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function index(Request $request){
        if(Auth::user()->hasRole('Admin')){
            return redirect()->to('/dashboard');
        }
        
        if(Auth::user()->hasRole('Alumni')){
            return redirect()->to('/dashboard')->with(['message' => 'Selamat datang alumni']);
        }

        return redirect()->to('/dashboard')->with(['message' => 'Mohon Tunggu Persetujuan admin']);
    }
}
