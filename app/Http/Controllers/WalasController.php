<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use App\Models\Siswa;
use App\Models\Walas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class WalasController extends Controller
{
    public function login()
    {
        return view("auth.walasLogin");
    }
    public function doLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nuptk' => 'required|string',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $nuptk = $request->input("nuptk");
        $password = $request->input("password");

        $walas = Walas::where("nuptk", $nuptk)->first();
        if(!$walas){
            return redirect("/walas/login")->withErrors([
                'error' => 'User tidak valid',
            ]);
        }
        
        if (!Hash::check($password, $walas->password)) {
            return redirect("/walas/login")->withErrors([
                'error' => 'User tidak valid',
            ]);
        }

        $request->session()->put("nuptk", $nuptk);
        
        return redirect("/absensi/walas");
    }
    public function createWalas(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'nuptk' => 'required',
            'username' => 'required|string',
            'password' => 'required|string',
            'kelas' => 'required|in:rpl1,rpl2',
       ]);
    
        if ($validator->fails()) {
            return redirect()->route('/walas')->withErrors($validator);
        }

        $nuptk = $request->input("nuptk");
        $password = $request->input("password");
        $username = $request->input("username");
        $kelas = $request->input("kelas");

        $walas = Walas::where("nuptk", $nuptk)->first();
        if($walas){
            return redirect()->route('dashboard')->withErrors([
                "error" => "Data walas tidak valid"
            ]);
        }

        $walas = new Walas();
        $walas->nuptk = $nuptk;
        $walas->username = $username;
        $walas->password = Hash::make($password);
        $walas->kelas = $kelas;
        $walas->save();
        
        return redirect('/walas')->with('pesan', "Akun $walas->username berhasil dibuat");;
    }

    public function deleteWalas(Request $request)
    {
        $walas_id = $request->input("walas_id");
        $walas = Walas::where("id", $walas_id)->first();
        $walas->delete();
        return redirect("walas")->with('pesan', "Hapus data $walas->username berhasil");
    }
    
    public function editWalas($id)
    {
        $walas_id = $id;
        $walas = Walas::where("id", $walas_id)->first();
        return view("pages.editPageWalas", [
            "walas" => $walas
        ]);
    }
    
    public function updateWalas(Request $request)
    {
        $walas_id = $request->input("walas_id");
        $username = $request->input("username");
        $password = $request->input("password");

        $walas = Walas::where("id", $walas_id)->first();

        
        if($username == $walas->username || Hash::check($password, $walas->password)){
            return redirect("walas")->with("pesan", "tidak ada perubahan data");
        }

        if($username != $walas->username){
            $walas->username = $username;
            
        }

        if($password){
            $walas->password = Hash::make($password); 
        }
        
        $walas->save();
        
        return redirect("walas")->with("pesan", "data walas berhasil di update");
    }

    public function walasPage()
    {
        $walas = Walas::all();
        return view("pages.kelolaWalas", [
            "walas" => $walas
        ]);
    }

    public function pesanWalas(Request $request)
    {
        //mendapat session
        $nutpk = session("nuptk");
        if($nutpk){
            $walas = Walas::where("nuptk", $nutpk)->first();
            $username = $walas->username;
        }

        $siswas = Siswa::all();

        $pesan = [];
        foreach($siswas as $siswa){
            $counter = 0;
            foreach($siswa->absensis as $data){
                if($data->status == "Tidak Hadir"){
                    $counter++;
                }
                if($data->status == "Tidak Hadir" && $counter > 0){
                    if($counter >= 3){
                        $siswa = Siswa::where("id", $data->siswa_id)->first();
                        $dataPesan = "$siswa->nama Tidak dalam 3 hari pada tanggal $data->tanggal";
                        
                        $pesan = Pesan::where("walas_id", $walas->id)
                            ->where("pesan", $dataPesan)
                            ->first();

                        if(!$pesan){
                            $walas->pesans()->create([
                                "pesan" =>  $dataPesan
                            ]);
                        }
                        $counter = 0;
                    }
                    continue;
                }
                $counter = 0;
            }
            $pesan = [];
        }

        $pesans = $walas->pesans()->get();

        return response()->view("pages.pesanWalas",[
            "username" => $username,
            "pesans" => $pesans
        ]);
    }

    public function logout(Request $request)
    {
        // Clear the user's session
        $request->session()->forget('nuptk');

        // Redirect to the login page
        return redirect('/walas/login');
    }
}
