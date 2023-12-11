<?php

namespace App\Exports;

use App\Models\Survei;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DataDanPertanyaanSurveiClass implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $survei = Survei::get();
        $data = User::DataAlumni()->get();
        return view('tabel.data_dan_survei', compact('data', 'survei'));
    }
}
