<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('registerpage');
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => ['required','unique:users', 'email'],
            'password' => 'required',
            'gender' => 'required',
            'dob' => ['required', 'before: -13 years']
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        $request->session()->flash('sukses','Registration success!');

        return redirect('/login');
    }
}
