<?php

namespace App\Exports;

use App\Models\Survei;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DataSurveiClass implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $data = Survei::get();
        return view('tabel.survei', compact('data'));
    }
}
