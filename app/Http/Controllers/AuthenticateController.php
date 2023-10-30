<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('Admin')) {
            return redirect()->route('adminDashboard');
        }
        if (Auth::user()->hasRole('Alumni')) {
            return redirect()->route('dashboard')->with(['message' => 'Selamat datang alumni']);
        }

        return redirect()->route('dashboard')->with(['message' => 'Mohon Tunggu Persetujuan admin']);
    }
}
