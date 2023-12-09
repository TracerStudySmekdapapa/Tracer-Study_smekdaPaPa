<?php

namespace App\Exports;

use App\Models\Survei;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DataSurveiClass implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $data = User::with('jawaban', 'pribadie')->whereHas('jawaban', function ($q) {
            $q->whereNotNull('id_user');
        })->get();
        $survei = Survei::get();

        return view('tabel.data_survei', compact('data', 'survei'));
    }
}
