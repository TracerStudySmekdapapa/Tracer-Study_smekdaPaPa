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
        $userData = [
            [
                'name' => 'rehan',
                'email' => 'rehan@gmail.com',
                'password' => bcrypt('123'),
                'bio' => 'Aku adalah Yin',
                'profil_picture' => random_int(1, 4) . '.jpg',
            ],
            [
                'name' => 'habibiesanji',
                'email' => 'habibiesanji@gmail.com',
                'password' => bcrypt('123'),
                'bio' => 'Aku adalah Yin',
                'profil_picture' => random_int(1, 4) . '.jpg',
            ],
        ];

        $pribadiData = [
            [
                'nisn' => "12345678",
                'no_telp' => "089534195182",
                'tempat_lahir' => "Padang Panjang",
                'tanggal_lahir' => "2006-10-05",
                'agama' => "Islam",
                'jenis_kelamin' => "Laki-Laki",
                'id_jurusan' => 5,
                'tamatan' => "2023",
            ],
            [
                'nisn' => "006972922",
                'no_telp' => "089534195182",
                'tempat_lahir' => "Padang Panjang",
                'tanggal_lahir' => "2006-10-05",
                'agama' => "Islam",
                'jenis_kelamin' => "Laki-Laki",
                'id_jurusan' => 5,
                'tamatan' => "2006",
            ],
        ];


        foreach ($userData as $key => $data) {
            $user = User::create($data);
            $user->assignRole('Alumni');

            $pribadi = $pribadiData[$key];
            $pribadi['id_user'] = $user->id_user;

            Pribadi::create($pribadi);
        }
    }
}
