<?php

namespace App\Http\Controllers;

use App\Models\Walas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class WalasController extends Controller
{
    public function createWalas(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'nuptk' => 'required',
            'username' => 'required|string',
            'password' => 'required|string',
       ]);
    
        if ($validator->fails()) {
            return redirect()->route('/walas')->withErrors($validator);
        }

        $nuptk = $request->input("nuptk");
        $password = $request->input("password");
        $username = $request->input("username");

        $walas = Walas::where("nuptk", $nuptk)->first();
        if($walas){
            return redirect()->route('dashboard')->withErrors([
                "error" => "Data walas tidak valid"
            ]);
        }

        $walas = new Walas();
        $walas->nuptk = $nuptk;
        $walas->username = $username;
        $walas->password = $password;
        $walas->save();
        
        return redirect('/walas')->with('pesan', "Akun $walas->username berhasil dibuat");;
    }

    public function deleteWalas(Request $request){
        $walas_id = $request->input("walas_id");
        $walas = Walas::where("id", $walas_id)->first();
        $walas->delete();
        return redirect("walas")->with('pesan', "Hapus data $walas->username berhasil");
    }
    
    public function editWalas($id){
        $walas_id = $id;
        $walas = Walas::where("id", $walas_id)->first();
        return view("pages.editPageWalas", [
            "walas" => $walas
        ]);
    }
    
    public function updateWalas(Request $request){
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
        
        return redirect("walas")->with("pesan", "data walas berhasil di update");;
    }

    public function walasPage()
    {
        $walas = Walas::all();
        return view("pages.kelolaWalas", [
            "walas" => $walas
        ]);
    }
}
