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
                'profil_picture' => 'laki_' . random_int(6, 10) . '.webp',
            ],
            [
                'name' => 'habibiesanji',
                'email' => 'habibiesanji@gmail.com',
                'password' => bcrypt('123'),
                'bio' => 'Aku adalah Yin',
                'profil_picture' => 'laki_' . random_int(6, 10) . '.webp',
            ],
            [
                'name' => 'agus',
                'email' => 'agus@gmail.com',
                'password' => bcrypt('123'),
                'bio' => 'Aku adalah Yin',
                'profil_picture' => 'laki_' . random_int(6, 10) . '.webp',
            ],
            [
                'name' => 'kevin',
                'email' => 'kevin@gmail.com',
                'password' => bcrypt('123'),
                'bio' => 'Aku adalah Yin',
                'profil_picture' => 'laki_' . random_int(6, 10) . '.webp',
            ],
            [
                'name' => 'lutfi',
                'email' => 'lutfi@gmail.com',
                'password' => bcrypt('123'),
                'bio' => 'Aku adalah Yin',
                'profil_picture' => 'laki_' . random_int(6, 10) . '.webp',
            ],
            [
                'name' => 'alfi',
                'email' => 'alfi@gmail.com',
                'password' => bcrypt('123'),
                'bio' => 'Aku adalah Yin',
                'profil_picture' => 'laki_' . random_int(6, 10) . '.webp',
            ],
            [
                'name' => 'aa',
                'email' => 'aa@gmail.com',
                'password' => bcrypt('123'),
                'bio' => 'Aku adalah Yin',
                'profil_picture' => 'laki_' . random_int(6, 10) . '.webp',
            ],
            [
                'name' => 'bb',
                'email' => 'bb@gmail.com',
                'password' => bcrypt('123'),
                'bio' => 'Aku adalah Yin',
                'profil_picture' => 'laki_' . random_int(6, 10) . '.webp',
            ],
            [
                'name' => 'cc',
                'email' => 'cc@gmail.com',
                'password' => bcrypt('123'),
                'bio' => 'Aku adalah Yin',
                'profil_picture' => 'laki_' . random_int(6, 10) . '.webp',
            ],
            [
                'name' => 'dd',
                'email' => 'dd@gmail.com',
                'password' => bcrypt('123'),
                'bio' => 'Aku adalah Yin',
                'profil_picture' => 'laki_' . random_int(6, 10) . '.webp',
            ],
            [
                'name' => 'ee',
                'email' => 'ee@gmail.com',
                'password' => bcrypt('123'),
                'bio' => 'Aku adalah Yin',
                'profil_picture' => 'laki_' . random_int(6, 10) . '.webp',
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
            [
                'nisn' => "008766",
                'no_telp' => "089874195182",
                'tempat_lahir' => "Padang Panjang",
                'tanggal_lahir' => "2007-11-05",
                'agama' => "Islam",
                'jenis_kelamin' => "Laki-Laki",
                'id_jurusan' => 2,
                'tamatan' => "2023",
            ],
            [
                'nisn' => "00543333",
                'no_telp' => "0895340678",
                'tempat_lahir' => "Panjang",
                'tanggal_lahir' => "2010-04-05",
                'agama' => "Islam",
                'jenis_kelamin' => "Laki-Laki",
                'id_jurusan' => 3,
                'tamatan' => "2022",
            ],
            [
                'nisn' => "008766099",
                'no_telp' => "089855343",
                'tempat_lahir' => "Padang",
                'tanggal_lahir' => "2007-11-05",
                'agama' => "Kristen",
                'jenis_kelamin' => "Perempuan",
                'id_jurusan' => 1,
                'tamatan' => "2023",
            ],
            [
                'nisn' => "00547899",
                'no_telp' => "0866540678",
                'tempat_lahir' => "Panjang kelas",
                'tanggal_lahir' => "2011-02-11",
                'agama' => "Islam",
                'jenis_kelamin' => "Laki-Laki",
                'id_jurusan' => 3,
                'tamatan' => "2022",
            ],
            [
                'nisn' => "13242442",
                'no_telp' => "08992837",
                'tempat_lahir' => "Padang",
                'tanggal_lahir' => "2007-11-05",
                'agama' => "Kristen",
                'jenis_kelamin' => "Perempuan",
                'id_jurusan' => 2,
                'tamatan' => "2022",
            ],
            [
                'nisn' => "005410101",
                'no_telp' => "0860973678",
                'tempat_lahir' => "Panjang kelas",
                'tanggal_lahir' => "2011-02-12",
                'agama' => "Islam",
                'jenis_kelamin' => "Laki-Laki",
                'id_jurusan' => 4,
                'tamatan' => "2022",
            ],
            [
                'nisn' => "14442442",
                'no_telp' => "088882837",
                'tempat_lahir' => "Padang",
                'tanggal_lahir' => "2014-12-21",
                'agama' => "Kristen",
                'jenis_kelamin' => "Perempuan",
                'id_jurusan' => 1,
                'tamatan' => "2023",
            ],
            [
                'nisn' => "0088981",
                'no_telp' => "08678788",
                'tempat_lahir' => "kelas",
                'tanggal_lahir' => "2009-12-13",
                'agama' => "Islam",
                'jenis_kelamin' => "Laki-Laki",
                'id_jurusan' => 1,
                'tamatan' => "2022",
            ],
            [
                'nisn' => "0008888888",
                'no_telp' => "08963626",
                'tempat_lahir' => "kelas RPL",
                'tanggal_lahir' => "2009-08-22",
                'agama' => "Islam",
                'jenis_kelamin' => "Laki-Laki",
                'id_jurusan' => 3,
                'tamatan' => "2022",
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
