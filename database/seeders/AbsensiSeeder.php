<?php

namespace Database\Seeders;

use App\Models\Absensi;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbsensiSeeder extends Seeder
{
    public function run(): void
    {
        // $siswas = Siswa::all();
        // foreach($siswas as $siswa){
        //     $siswa->absensis()->create([
        //         "nama_kelas" => "rpl1"
        //     ]);
        // } 
        $siswas = Siswa::all();

        foreach ($siswas as $siswa) {
            if($siswa->kelas == "rpl1"){

                $currentDate = Carbon::parse('2023-12-31');
                
                while ($currentDate->lte(Carbon::parse('2024-02-06'))) {
                    $siswa->absensis()->create([
                        'nama_kelas' => 'rpl1',
                        'tanggal' => $currentDate->toDateString(),
                        'status' => rand(0, 1) ? 'Hadir' : 'Tidak Hadir',
                        'keterangan' => rand(0, 1) ? 'Sakit' : null,
                    ]);
    
                    $currentDate->addDay();
                }
            }else{
                $currentDate = Carbon::parse('2023-12-31');
                
                while ($currentDate->lte(Carbon::parse('2024-02-06'))) {
                    $siswa->absensis()->create([
                        'nama_kelas' => 'rpl2',
                        'tanggal' => $currentDate->toDateString(),
                        'status' => rand(0, 1) ? 'Hadir' : 'Tidak Hadir',
                        'keterangan' => rand(0, 1) ? 'Sakit' : null,
                    ]);
    
                    $currentDate->addDay();
                }
            }
        }
    }
}
