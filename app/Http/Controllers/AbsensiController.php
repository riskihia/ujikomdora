<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Bk;
use App\Models\Sekretaris;
use App\Models\Siswa;
use App\Models\Walas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbsensiController extends Controller
{
    public function indexSekretaris()
    {
        //mendapatkan tanggal
        $tanggal = Carbon::now()->isoFormat('D MMMM Y');
        $hari = Carbon::now()->isoFormat('dddd');

        $nis = session("nis");
        $sekretaris = Siswa::where("nis", $nis)->first();
        $username = $sekretaris->nama;

        $notValidDay = ["Sabtu"];
        // $notValidDay = ["Sabtu", "Minggu"];

        $absensi = Absensi::where("nama_kelas", $sekretaris->kelas)
            ->whereDate('tanggal', now()->toDateString())
            ->first();
        
        if(!$absensi){
            $siswas = Siswa::all();
            foreach($siswas as $siswa){
                $siswa->absensis()->create([
                    "nama_kelas" => $sekretaris->kelas
                ]);
            }
        }

        $absensi = Absensi::where("nama_kelas", $sekretaris->kelas)
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
        
        $absensi = Absensi::where("nama_kelas", $sekretaris->kelas)
            ->whereDate('tanggal', now()->toDateString())
            ->get();
        return view("pages.absensiPage", [
            "username" => $username,
            "absensi" => $absensi,
            "tanggal" => $tanggal,
            "hari" => $hari
        ]);
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

    public function show(Request $request, $filter)
    {
        $validator = Validator::make(['filter' => $filter], [
            'filter' => 'required|in:hari-ini,minggu,bulan',
        ]);
    
        if ($validator->fails()) {
            return redirect('/absensi/walas');
        }

        //mendapatkan query string
        $isPdf = $request->query('isPdf');
        $isShowBulan = false; //var bantu untuk render bulan di pdf

        //mendapat session
        $nutpk = session("nuptk");
        $nis = session("nis");
        if($nutpk){
            $model = Walas::where("nuptk", $nutpk)->first();
            if(!$model){
                $model = Bk::where("nuptk", $nutpk)->first();
            }
            $username = $model->username;
        }else{
            $model = Siswa::where("nis", $nis)->first();
            $username = $model->nama;
        }

        $siswas = Siswa::all();

        //dapatkan data kelas
        $kelas = $model->kelas ??  $request->input('kelas') ?? 'rpl1';

        //mendapatkan tanggal
        $tanggal = Carbon::now()->isoFormat('D MMMM Y');
        $hari = Carbon::now()->isoFormat('dddd');

        if($filter == "hari-ini"){
            $today = Carbon::now()->toDateString();
            $absensis = Absensi::where("nama_kelas",$kelas)
                ->where('tanggal', $today)
                ->get();
        }
        
        if($filter == "minggu"){
            $startOfWeek = Carbon::now()->startOfWeek()->toDateString();
            $endOfWeek = Carbon::now()->endOfWeek()->toDateString();

            $absensis = Absensi::where("nama_kelas",$kelas )
                ->whereBetween('tanggal', [$startOfWeek, $endOfWeek])
                ->get();
        }
        if($filter == "bulan"){
            $startOfMonth = Carbon::now()->startOfMonth()->toDateString();
            $endOfMonth = Carbon::now()->endOfMonth()->toDateString();
        
            $absensis = Absensi::where("nama_kelas",$kelas )
                ->whereBetween('tanggal', [$startOfMonth, $endOfMonth])
                ->get();
                $isShowBulan = true;
        }

        if($isPdf){
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML(view("pdf.absensi", [
                "siswas" => $siswas,
                "absensis" => $absensis,
                "isShowBulan" => $isShowBulan 
            ]));

            // Output a PDF file directly to the browser
            $mpdf->Output();
        }

        return view("pages.dataAbsensiPage", [
            "username" => $username,
            "siswas" => $siswas,
            "absensis" => $absensis,
            "tanggal" => $tanggal,
            "hari" => $hari,
            "kelas" => $kelas,
        ]);
    }

    public function update(Request $request)
    {
        //get tanggal
        $tanggal = Carbon::now()->toDateString();

        // dd($request->input());
        $inputData = $request->except('_token'); // Menghilangkan _token dari data input
        $tidakHadir = ["sakit", "alpha", "izin"];

        // Loop untuk setiap id siswa
        foreach ($inputData as $siswaId => $keterangan) {
            $status = "Hadir";
            if(in_array($keterangan, $tidakHadir)){
                $status = "Tidak Hadir";
            }
            Absensi::where('siswa_id', $siswaId)
                ->where("tanggal", $tanggal)
                ->update([
                'status' => $status,
                'keterangan' => $keterangan,
            ]);
        }

        if(session()->has('nuptk')){
            return redirect('/absensi/walas')->with('pesan', "Data absensi berhasil disimpan");
        }else{
            return redirect('/absensi/sekretaris')->with('pesan', "Data absensi berhasil disimpan");
        }
    }

    public function contoh()
    {
        // Create an instance of the class:
        $mpdf = new \Mpdf\Mpdf();

        // Write some HTML code:
        $mpdf->WriteHTML('Hello World');

        // Output a PDF file directly to the browser
        $mpdf->Output();
    }
    
}
