<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function showGameDetails($id){
        //ini buat kolom yang di cari itu primary key ya
        $game = Games::find($id);

        // dd($game);

        return view('gameDetail',compact('game'));
    }
}
