<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::check()){

            if(Auth::user()->role == 'admin'){
                $games = Games::paginate(10);
            }
            else{
                $age = Carbon::parse(Auth::user()->dob)->age;
                $games = Games::where('rating','<=',$age)
                            ->paginate(10);
            }

        }

        else{
            $games = Games::paginate(10);
        }

        return view('home', compact('games'));
    }

    public function searchGame(Request $request)
    {
        $keyword = $request->keyword;

        $games = Games::where('title','LIKE',"%$keyword%")
                    ->paginate(10)
                    ->appends(['keyword' => $keyword]);

        return view('home',compact('games'));
    }
}
