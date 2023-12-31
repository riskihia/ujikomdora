<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Siswa::create([
        //     "nis" => "123",
        //     "nama" => "dinda",
        //     "jenis_kelamin" => "laki-laki",
        //     "kelas" => "rpl1"
        // ]);
        // Siswa::create([
        //     "nis" => "321",
        //     "nama" => "ucok",
        //     "jenis_kelamin" => "wanita",
        //     "kelas" => "rpl1"
        // ]);
        for ($i = 1; $i <= 10; $i++) {
            Siswa::create([
                "nis" => "NIS" . $i,
                "nama" => "Siswa " . $i,
                "jenis_kelamin" => $i % 2 == 0 ? 'laki-laki' : 'wanita',
                "kelas" => "rpl1"
            ]);
        }
    }
}
