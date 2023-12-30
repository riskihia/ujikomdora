<?php

namespace App\Http\Controllers;

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
        $nutpk = session("nuptk");
        $walas = Walas::where("nuptk", $nutpk)->first();
        $username = $walas->username;

        $siswas = Siswa::where("kelas", $walas->kelas)->get();

        //mendapatkan tanggal
        $tanggal = Carbon::now()->isoFormat('D MMMM Y');
        $hari = Carbon::now()->isoFormat('dddd');
        return view("pages.absensiPage", [
            "username" => $username,
            "siswas" => $siswas,
            "tanggal" => $tanggal,
            "hari" => $hari
        ]);
    }

    public function update(Request $request)
    {
        $tanggal = Carbon::now()->isoFormat('D MMMM Y');
        $hari = Carbon::now()->isoFormat('dddd');
        dd([$request->input(),$tanggal, $hari]);
    }
}
