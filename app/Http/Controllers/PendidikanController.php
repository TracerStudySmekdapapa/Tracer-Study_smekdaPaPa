<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendidikanController extends Controller
{

    public static function alumniPendidikan()
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
                DB::raw("(SELECT id_pribadi, COUNT(DISTINCT id_pendidikan) as total_pekerjaan FROM pendidikan GROUP BY id_pribadi) as pendidikan"),
                'data_pribadi.id_pribadi',
                '=',
                'pendidikan.id_pribadi'
            )
            ->count();

        return $alumniCount;
    }

    public static function alumniPendidikanPertahun()
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
                    DB::raw("(SELECT id_pribadi, COUNT(DISTINCT id_pendidikan) as total_pekerjaan FROM pendidikan GROUP BY id_pribadi) as pendidikan"),
                    'data_pribadi.id_pribadi',
                    '=',
                    'pendidikan.id_pribadi'
                )
                ->where('data_pribadi.tamatan', $tahun)
                ->groupBy('data_pribadi.id_pribadi')
                ->selectRaw('COUNT(pendidikan.id_pribadi) as total_pendidikan')
                ->count();

            $data[$tahun] = $alumniCount;
        }
        return $data;
    }
}
