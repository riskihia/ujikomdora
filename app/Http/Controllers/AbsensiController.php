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
        
        $siswas = Siswa::where("kelas", $walas->kelas)->get();

        $notValidDay = ["Minggu"];
        // $notValidDay = ["Sabtu", "Minggu"];

        $absensi = Absensi::where("nama_kelas", $walas->kelas)->first();
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
        $absensi = Absensi::where("nama_kelas", $walas->kelas)->get();        
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
}
