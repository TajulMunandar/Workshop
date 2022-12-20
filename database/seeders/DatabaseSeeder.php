<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Prodi;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Prodi::create([
            'name_prodi' => 'Teknik Informatika',
            'nama_ketua_prodi' => 'Salahuddin'
        ]);

        User::create([
            'nim' => '2020573010071',
            'name' => 'M Tajul Munandar',
            'asalkampus' => 'Politeknik Negeri Lhokseumawe',
            'password' => Hash::make('123'),
            'role' => 0,
            'id_prodi' => 1,
        ]);
    }
}
