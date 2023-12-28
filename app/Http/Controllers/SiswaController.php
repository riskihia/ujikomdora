<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    //
    public function index()
    {
        $siswas1 = Siswa::where("kelas", "rpl1")->get();
        $siswas2 = Siswa::where("kelas", "rpl2")->get();
        
        return view('pages.kelolaSiswa',[
            'siswas1'=>$siswas1,
            'siswas2'=>$siswas2
        ]);
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nis' => 'required',
            'nama' => 'required',
            'kelamin' => 'required|in:laki-laki,wanita',
            'kelas' => 'required|in:rpl1,rpl2',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $nis = $request->input('nis');
        $nama = $request->input('nama');
        $jenis_kelamin = $request->input('kelamin');
        $kelas = $request->input('kelas');

        $siswa = Siswa::where("nis", $nis)->first();
        if ($siswa) {
            return redirect()->back()->withErrors([
                "error" => "Data siswa tidak valid"
            ])->withInput();
        }

        $siswa = new Siswa();
        $siswa->nis = $nis;
        $siswa->nama = $nama;
        $siswa->jenis_kelamin = $jenis_kelamin;
        $siswa->kelas = $kelas;

        $siswa->save();
        
        return redirect('/siswa')->with('pesan', "Akun $siswa->username berhasil dibuat");;
    }
    public function edit($id)
    {
        $siswa_id = $id;
        $siswa = Siswa::where("id", $siswa_id)->first();

        return view("pages.editPageSiswa", [
            "siswa" => $siswa
        ]);
    }
    public function update(Request $request)
    {
        $siswa_id = $request->input("siswa_id");
        $nama = $request->input("nama");

        $siswa = Siswa::where("id", $siswa_id)->first();

        if($nama != $siswa->nama){
            $siswa->nama = $nama;
        }

        $siswa->save();
        
        return redirect("/siswa")->with("pesan", "data siswa berhasil di update");
    }
    public function destroy(Request $request)
    {
        $siswa_id = $request->input("siswa_id");
        $siswa = Siswa::where("id", $siswa_id)->first();
        $siswa->delete();
        return redirect("/siswa")->with('pesan', "Hapus data $siswa->nama berhasil");
    }
}
