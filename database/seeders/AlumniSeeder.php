<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use App\Models\Pribadi;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'rehan',
            'email' => 'rehan@gmail.com',
            'password' => bcrypt('123'),
            'bio' => 'Aku adalah Yin',
            'profil_picture' => random_int(1, 4) . '.jpg'
        ]);

        $user->assignRole('Alumni');

        Pribadi::create([
            'nisn' => "006972922",
            'no_telp' => "089534195182",
            'tempat_lahir' => "Padang Panjang",
            'tanggal_lahir' => "2006-10-05",
            'agama' => "Islam",
            'jenis_kelamin' => "Laki-Laki",
            'id_jurusan' => 5,
            'tamatan' => "2024",
            'id_user' => $user->id_user
        ]);
    }
}
