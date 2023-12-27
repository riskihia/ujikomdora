<?php

namespace App\Http\Controllers;

use App\Models\Sekretaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SekretarisController extends Controller
{
    //
    public function createSekretaris(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'nuptk' => 'required',
            'username' => 'required|string',
            'password' => 'required|string',
       ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $nuptk = $request->input("nuptk");
        $password = $request->input("password");
        $username = $request->input("username");

        $sekretaris = Sekretaris::where("nuptk", $nuptk)->first();
        if($sekretaris){
            return redirect()->route('/sekretaris')->withErrors([
                "error" => "Data sekretaris tidak valid"
            ]);
        }

        $sekretaris = new Sekretaris();
        $sekretaris->nuptk = $nuptk;
        $sekretaris->username = $username;
        $sekretaris->password = $password;
        $sekretaris->save();
        
        return redirect('/sekretaris')->with('pesan', "Akun $sekretaris->username berhasil dibuat");;
    }

    public function deleteSekretaris(Request $request)
    {
        $sekretaris_id = $request->input("sekretaris_id");
        $sekretaris = Sekretaris::where("id", $sekretaris_id)->first();
        $sekretaris->delete();
        return redirect("sekretaris")->with('pesan', "Hapus data $sekretaris->username berhasil");
    }
    
    public function editSekretaris($id)
    {
        $sekretaris_id = $id;
        $sekretaris = Sekretaris::where("id", $sekretaris_id)->first();
        return view("pages.editPageSekretaris", [
            "sekretaris" => $sekretaris
        ]);
    }
    
    public function updateSekretaris(Request $request)
    {
        $sekretaris_id = $request->input("walas_id");
        $username = $request->input("username");
        $password = $request->input("password");

        $sekretaris = Sekretaris::where("id", $sekretaris_id)->first();

        
        if($username == $sekretaris->username || Hash::check($password, $sekretaris->password)){
            return redirect("sekretaris")->with("pesan", "tidak ada perubahan data");
        }

        if($username != $sekretaris->username){
            $sekretaris->username = $username;
        }

        if($password){
            $sekretaris->password = Hash::make($password); 
        }
        
        $sekretaris->save();
        
        return redirect("sekretaris")->with("pesan", "data sekretaris berhasil di update");;
    }

    public function sekretarisPage()
    {
        $sekretaris = Sekretaris::all();
        return view("pages.kelolaSekretaris", [
            "sekretaris" => $sekretaris
        ]);
    }
}
