<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;

class LoginController extends Controller
{
    //
    public function index(){
        return view('loginpage');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required'],
        ]);

        if($request->remember){
            Cookie::queue('email',$request->email,10080);
            Cookie::queue('password',$request->password,10080);
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(){
        Auth::logout();

        // DB::table('carts')->truncate(); //hapus carts
        session()->flush(); // hapus session

        return redirect('/');
    }
}
