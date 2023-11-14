<?php

namespace App\Exports;

use App\Http\Controllers\PribadiController;
use App\Models\Pribadi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class FreshGraduateClass implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function view(): View
    {
        $freshGraduate = PribadiController::alumniFreshGraduate()->get();
        return view('tabel.fresh_graduate', compact('freshGraduate'));
    }
}
