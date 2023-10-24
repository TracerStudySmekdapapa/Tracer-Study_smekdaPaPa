<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pekerjaan;
use App\Models\Pribadi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    public function alumniPertahun()
    {
        $data = [];
        for ($tahun = 2006; $tahun <= Carbon::now()->year(); $tahun++) {
            $alumniCount = Pribadi::where('tamatan', $tahun)->count();
            $data[] = $alumniCount;
        }
        $responseData = ['data' => $data];

        return response(json_encode($responseData, JSON_PRETTY_PRINT))
            ->header('Content-Type', 'application/json');
    }

    public function alumniBekerja()
    {
        // Dapatkan semua alumni
        /* $alumni = User::whereHas('roles', function ($query) {
            $query->where('name', 'Alumni');
        })->get();

        foreach ($alumni as $alumniUser) {
            $pribadi = Pribadi::where('id_user', $alumniUser->id_user)->get();
            foreach ($pribadi as $alumni) {
                $jumlahOrangBekerja = Pekerjaan::where('id_pribadi', $alumni->id_pribadi)->count();
            }
        } */

        $alumniYangBekerjaPertahun = [];

        $alumniYears = range(2006, 2024);

        foreach ($alumniYears as $tahun) {
            $alumni = User::whereHas(
                'roles',
                function ($query) {
                    $query->where('name', 'Alumni');
                }
            )->whereHas('alumni', function ($query) use ($tahun) {
                $query->where('tamatan', $tahun);
            })->get();

            $jumlahOrangBekerja = 0;

            foreach ($alumni as $alumniUser) {
                $pribadi = $alumniUser->alumni;
                foreach ($pribadi as $alumni) {
                    $jumlahOrangBekerja += $alumni->pekerjaan->count();
                }
            }

            $alumniYangBekerjaPertahun[$tahun] = $jumlahOrangBekerja;
        }

        // Hasilnya adalah array yang berisi jumlah orang yang bekerja untuk setiap tahun dari 2006 hingga 2024
        return $alumniYangBekerjaPertahun;


        // Hasilnya adalah array yang berisi jumlah orang yang bekerja untuk setiap alumni dengan peran "Alumni"
        // return $alumniYangBekerja;

        // dd($responseData);
    }
}
