<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jurusan = [
            'Desain Komunikasi Visual',
            'Produksi dan Siaran Program Televisi',
            'Multimedia',
            'Pengembangan Perangkat Lunak dan Gim',
            'Rekayasa Perangkat Lunak',
            'Teknik Komputer Jaringan'
        ];

        foreach ($jurusan as $nama_jurusan) {
            Jurusan::create(['nama_jurusan' => $nama_jurusan]);
        }
    }
}
