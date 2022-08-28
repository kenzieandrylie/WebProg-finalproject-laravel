<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    //
    public function index()
    {
        return view('profile');
    }
    //edit profile
    public function editProfile(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => ['required','unique:users'],
            'image' => ['image']
        ]);

        $user = User::find(Auth::user()->id);

        $user->name = $request->name;
        $user->email = $request->email;

        $file = $request->file('image');
        if($file != null){
            $imageName = time().'.'.$file->getClientOriginalExtension();

            Storage::putFileAs('public/images', $file, $imageName);

            Storage::delete('public/'.$user->image);

            $user->image = 'images/'.$imageName;
        }

        $user->save();
        session()->flash('sukses','profile has been updated!');

        return redirect('/profile');
    }

    //edit password
    public function editPassword(Request $request){

        $request->validate([
            'password' => ['required'],
            'new_password' => ['required'],
            'confirm_password' => ['required']
        ]);

        $user = User::find(Auth::user()->id);

        if(Hash::check($request->password, Auth::user()->password)){

            if($request->new_password == $request->password){
                session()->flash('declined','new password must not be same as old password!');
                return redirect('/profile');
            }

            if($request->confirm_password != $request->new_password){
                session()->flash('declined','confirmation password must be same with new password!');
                return redirect('/profile');
            }

            else{
                $user->password = Hash::make($request->new_password);
                $user->save();
                session()->flash('sukses','password has been updated!');
                Auth::logout();
                return redirect('/login');
            }
        }
        else{
            session()->flash('declined','old password does not match our record!');
            return redirect('/profile');
        }

    }
}
