<?php

namespace App\Http\Controllers;

use App\Models\Bk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BkController extends Controller
{
    public function login()
    {
        return view("auth.bkLogin");
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

        $bk = Bk::where("nuptk", $nuptk)->first();
        if(!$bk){
            return redirect("/bk/login")->withErrors([
                'error' => 'User tidak valid',
            ]);
        }
        
        if (!Hash::check($password, $bk->password)) {
            return redirect("/bk/login")->withErrors([
                'error' => 'User tidak valid',
            ]);
        }

        $request->session()->put("nuptk", $nuptk);
        $request->session()->put("role", "bk");
        $request->session()->put("side", "bk");

        return redirect("/absensi/rpl1/data/hari-ini");
    }

    public function createBk(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'nuptk' => 'required',
            'username' => 'required|string',
            'password' => 'required|string',
       ]);
    
        if ($validator->fails()) {
            // return redirect()->route('/bk')->withErrors($validator);
            return back()->withErrors($validator)->withInput();
        }

        $nuptk = $request->input("nuptk");
        $password = $request->input("password");
        $username = $request->input("username");

        $bk = Bk::where("nuptk", $nuptk)->first();
        if($bk){
            return redirect()->route('/bk')->withErrors([
                "error" => "Data bk tidak valid"
            ]);
        }

        $bk = new Bk();
        $bk->nuptk = $nuptk;
        $bk->username = $username;
        $bk->password = Hash::make($password);
        $bk->save();
        
        return redirect('/bk')->with('pesan', "Akun $bk->username berhasil dibuat");
    }

    public function deleteBk(Request $request)
    {
        $bk_id = $request->input("bk_id");
        $bk = Bk::where("id", $bk_id)->first();
        $bk->delete();
        return redirect("bk")->with('pesan', "Hapus data $bk->username berhasil");
    }
    
    public function editBk($id)
    {
        $bk_id = $id;
        $bk = Bk::where("id", $bk_id)->first();
        return view("pages.editPageBk", [
            "bk" => $bk
        ]);
    }
    
    public function updateBk(Request $request)
    {
        $bk_id = $request->input("walas_id");
        $username = $request->input("username");
        $password = $request->input("password");

        $bk = Bk::where("id", $bk_id)->first();

        
        if($username == $bk->username || Hash::check($password, $bk->password)){
            return redirect("bk")->with("pesan", "tidak ada perubahan data");
        }

        if($username != $bk->username){
            $bk->username = $username;
        }

        if($password){
            $bk->password = Hash::make($password); 
        }
        
        $bk->save();
        
        return redirect("bk")->with("pesan", "data bk berhasil di update");;
    }

    public function bkPage()
    {
        $bk = Bk::all();
        return view("pages.kelolaBk", [
            "bk" => $bk
        ]);
    }
    public function logout(Request $request)
    {
        $request->session()->flush();

        // Redirect to the login page
        return redirect('/bk/login');
    }
}
