<?php

namespace Database\Seeders;

use App\Models\Survei;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            Survei::create(['pertanyaan' => 'Pertanyaan' . $i]);
        }
    }
}
