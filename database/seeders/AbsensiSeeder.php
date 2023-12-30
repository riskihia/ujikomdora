<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbsensiSeeder extends Seeder
{
    public function run(): void
    {
        $siswas = Siswa::all();

        // Specify the start and end dates for January 2024
        $startDate = '2024-01-01';
        $endDate = '2024-01-31';

        foreach ($siswas as $siswa) {
            // Generate absences for each day in January
            $currentDate = $startDate;
            while ($currentDate <= $endDate) {
                $siswa->absensis()->create([
                    'tanggal' => $currentDate,
                    'status' => rand(0, 1) ? 'Hadir' : 'Tidak Hadir',
                    'keterangan' => rand(0, 1) ? 'Sakit' : null,
                ]);

                // Move to the next day
                $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
            }
        }
    }
}
