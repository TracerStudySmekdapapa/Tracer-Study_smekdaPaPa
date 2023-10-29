<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pekerjaan;
use App\Models\Pribadi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PekerjaanController extends Controller
{

    public static function alumniBekerja()
    {
        $alumniCount = User::whereHas('roles', function ($query) {
            $query->where('name', 'Alumni');
        })->join(
            'data_pribadi',
            'users.id_user',
            '=',
            'data_pribadi.id_user'
        )
            ->join(
                DB::raw("(SELECT id_pribadi, COUNT(DISTINCT id_pekerjaan) as total_pekerjaan FROM pekerjaan GROUP BY id_pribadi) as pekerjaan"),
                'data_pribadi.id_pribadi',
                '=',
                'pekerjaan.id_pribadi'
            )
            ->count();

        return $alumniCount;
    }

    public static function alumniBekerjaPertahun()
    {
        $data = [];

        for ($tahun = 2006; $tahun <= Carbon::now()->year; $tahun++) {
            $alumniCount = User::whereHas('roles', function ($query) {
                $query->where('name', 'Alumni');
            })->join(
                'data_pribadi',
                'users.id_user',
                '=',
                'data_pribadi.id_user'
            )
                ->join(
                    DB::raw("(SELECT id_pribadi, COUNT(DISTINCT id_pekerjaan) as total_pekerjaan FROM pekerjaan GROUP BY id_pribadi) as pekerjaan"),
                    'data_pribadi.id_pribadi',
                    '=',
                    'pekerjaan.id_pribadi'
                )
                ->where('data_pribadi.tamatan', $tahun)
                ->groupBy('data_pribadi.id_pribadi')
                ->selectRaw('COUNT(pekerjaan.id_pribadi) as total_pekerjaan')
                ->count();

            $data[] = $alumniCount;
        }

        $prettyJson = ['data' => $data];
        return $prettyJson;
    }
}
