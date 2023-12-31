<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Siswa;
use App\Models\Walas;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function indexSekretaris()
    {

        return view("pages.absensiPage");
    }

    public function indexWalas(Request $request)
    {
        //mendapatkan tanggal
        $tanggal = Carbon::now()->isoFormat('D MMMM Y');
        $hari = Carbon::now()->isoFormat('dddd');

        $nutpk = session("nuptk");
        $walas = Walas::where("nuptk", $nutpk)->first();
        $username = $walas->username;

        $notValidDay = ["Sabtu"];
        // $notValidDay = ["Sabtu", "Minggu"];

        $absensi = Absensi::where("nama_kelas", $walas->kelas)
            ->whereDate('tanggal', now()->toDateString())
            ->first();
        if(!$absensi){
            $siswas = Siswa::all();
            foreach($siswas as $siswa){
                $siswa->absensis()->create([
                    "nama_kelas" => $walas->kelas
                ]);
            }
        }

        $absensi = Absensi::where("nama_kelas", $walas->kelas)
            ->whereDate('tanggal', now()->toDateString())
            ->first();

        $carbonHari = Carbon::createFromFormat('Y-m-d', $absensi->tanggal);
        $hari = $carbonHari->isoFormat('dddd');
        
        if(in_array($hari, $notValidDay)){
            return view("pages.absensiPage", [
                "username" => $username,
                "hari" => $hari,
                "tanggal" => $tanggal,
                "hari" => $hari
            ]);
        }
        
        $absensi = Absensi::where("nama_kelas", $walas->kelas)
            ->whereDate('tanggal', now()->toDateString())
            ->get();
        return view("pages.absensiPage", [
            "username" => $username,
            "absensi" => $absensi,
            "tanggal" => $tanggal,
            "hari" => $hari
        ]);
    }

    public function update(Request $request)
    {
        // dd($request->input());
        $inputData = $request->except('_token'); // Menghilangkan _token dari data input
        $tidakHadir = ["sakit", "alpha", "izin"];

        // Loop untuk setiap id siswa
        foreach ($inputData as $siswaId => $keterangan) {
            $status = "Hadir";
            if(in_array($keterangan, $tidakHadir)){
                $status = "Tidak Hadir";
            }
            Absensi::where('siswa_id', $siswaId)->update([
                'status' => $status,
                'keterangan' => $keterangan,
            ]);
        }

        return redirect('/absensi/walas')->with('pesan', "Data absensi berhasil disimpan");
    }

    public function show(){
        return response()->view("pages.dataAbsensiPage");
    }
}
