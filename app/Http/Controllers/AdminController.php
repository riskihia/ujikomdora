<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Walas;
use Dotenv\Repository\RepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function dashboard()
    {
        return response()->view("dashboard");
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

        if (!Hash::check($password, $user->password)) {
            return redirect()->route('login')->withErrors([
                'error' => 'User tidak valid',
            ]);
        }

        $request->session()->put("user_email", $email);
        
        return redirect('/walas');
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
        $user->password = Hash::make($password);
        $user->save();

        $request->session()->put("user_email", $email);
        
        return redirect('/walas');
    }
    
    public function logoutProses(Request $request)
    {
        // Clear the user's session
        $request->session()->forget('user_email');

        // Redirect to the login page
        return redirect()->route('login');
    }
}
