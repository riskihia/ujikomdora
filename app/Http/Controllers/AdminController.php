<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Walas;
use Dotenv\Repository\RepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function loginPage()
    {
        return view('auth.login');
    }
    public function loginProses(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator);
        }

        $email = $request->input("email");
        $password = $request->input("password");

        $user = Admin::where("email", $email)->first();
        if(!$user){
            return redirect()->route('login')->withErrors([
                "error" => "User tidak valid"
            ]);
        }

        if($password !== $user->password){
            return redirect()->route('login')->withErrors([
                "error" => "User tidak valid"
            ]);
        }

        $request->session()->put("user_email", $email);
        
        return redirect()->route("dashboard");
    }
    public function registerPage()
    {
        return view('auth.register');
    }
    public function registerProses(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required|min:6',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('register')->withErrors($validator);
        }

        $email = $request->input("email");
        $username = $request->input("username");
        $password = $request->input("password");

        $user = Admin::where("email", $email)->first();
        if($user){
            return redirect()->route('register')->withErrors([
                "error" => "Data tidak valid"
            ]);
        }

        $user = new Admin();
        $user->email = $email;
        $user->username = $username;
        $user->password = $password;
        $user->save();
        
        return redirect()->route("/");
    }

    public function createWalas(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'nuptk' => 'required',
            'password' => 'required|string',
       ]);
    
        if ($validator->fails()) {
            return redirect()->route('/walas')->withErrors($validator);
        }

        $nuptk = $request->input("nuptk");
        $password = $request->input("password");

        $walas = Walas::where("nuptk", $nuptk)->first();
        if($walas){
            return redirect()->route('dashboard')->withErrors([
                "error" => "Data walas tidak valid"
            ]);
        }

        $walas = new Walas();
        $walas->nuptk = $nuptk;
        $walas->password = $password;
        $walas->save();
        
        return redirect()->route("dashboard");
    }

    public function bkPage()
    {
        return view("pages.kelolaBk");
    }
    public function sekretarisPage()
    {
        return view("pages.kelolaSekretaris");
    }
    public function walasPage()
    {
        return view("pages.kelolaWalas");
    }
}
