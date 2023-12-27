<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //
    public function index()
    {
        $siswas = [];
        return view('pages.kelolaSiswa',[
            'siswas'=>$siswas
        ]);
    }
}
