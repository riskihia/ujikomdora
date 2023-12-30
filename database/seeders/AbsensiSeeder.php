<?php

namespace Database\Seeders;

use App\Models\Absensi;
use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbsensiSeeder extends Seeder
{
    public function run(): void
    {
        $siswas = Siswa::all();
        foreach($siswas as $siswa){
            $siswa->absensis()->create([
                "nama_kelas" => "rpl1"
            ]);
        } 
    }
}
