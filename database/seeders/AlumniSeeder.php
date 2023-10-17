<?php

namespace Database\Seeders;

use App\Models\Alumni;
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
            'profil_picture' => random_int(1, 4) . '.jpg'
        ]);

        $user->assignRole('Alumni');

        Alumni::create([
            'nisn' => "006972922",
            'no_telp' => "089534195182",
            'tempat_lahir' => "Padang Panjang",
            'tanggal_lahir' => "2006-10-05",
            'agama' => "Islam",
            'jenis_kelamin' => "Laki-Laki",
            'jurusan' => "RPL",
            'tamatan' => "2024",
            'id_user' => $user->id_user
        ]);
    }
}
