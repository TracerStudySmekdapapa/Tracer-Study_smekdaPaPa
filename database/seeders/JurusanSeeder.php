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
            'Teknik Komputer Jaringan',
            'Rekayasa Perangkat Lunak',
            'Pengembangan Perangkat Lunak Gim',
            'Multi Media',
            'Desain Komunikasi Visual',
            'Produksi Siaran Program Televisi'
        ];

        foreach ($jurusan as $nama_jurusan) {
            Jurusan::create(['nama_jurusan' => $nama_jurusan]);
        }
    }
}
