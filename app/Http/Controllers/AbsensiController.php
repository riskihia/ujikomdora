<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Walas;
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
        return view("pages.absensiPage", [
            "username" => $username,
            "siswas" => $siswas
        ]);
    }
}
