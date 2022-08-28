<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Genres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ManageController extends Controller
{
    public function index(){
        $games = Games::all();

        return view('manageGame', compact('games'));
    }

// Delete
    public function deleteGame($id){
        $game = Games::find($id);
        // Storage::delete('public/'.$game->image);
        $game->delete();

        return redirect()->back();
    }

// Add
    public function addGamePage(){
        $genres = Genres::all();

        return view('addGame',compact('genres'));
    }

    public function addGame(Request $request){
        $games = new Games();
        $genres = new Genres();
        $genreCheckID = $genres->latest('id')->first();
        // dd($genreCheckID->id += 1);
        if($request->genre <= $genreCheckID->id){ //genre lama
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'price' => ['numeric','required','gte:0'],
                'image' => ['required','image'],
                'genre' => 'required',
                'pegi' => 'required'
            ]);
            $games->genre_id = $request->genre;
        }else{ //genre baru
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'price' => ['numeric','required','gte:0'],
                'image' => ['required','image'],
                'newGenre' => ['required','unique:genres,name'],
                'pegi' => 'required'
            ]);
            $genres->name = $request->newGenre;
            $genres->save();
            $games->genre_id = $genreCheckID->id += 1;
        }

        $games->title = $request->title;
        $games->description = $request->description;
        $games->price = $request->price;

        $games->rating = $request->pegi;

        $file = $request->file('image');
        $imageName = time().'.'.$file->getClientOriginalExtension();
        Storage::putFileAs('public/images',$file,$imageName);

        $games->image = 'images/'.$imageName;

        $games->save();

        return redirect('/gameManage');
    }

    //Update
    public function editGamePage(Request $request){
        $game = Games::find($request->id);
        $genres = Genres::all();

        return view('editGame', compact('game','genres'));
    }

    public function editGame(Request $request){
        $game = Games::find($request->id);
        // dd($game);
        $genres = new Genres();
        $genreCheckID = $genres->latest('id')->first();

        // dd($genreCheckID->id += 1);
        if($request->genre <= $genreCheckID->id){ //genre lama
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'price' => ['numeric','required','gte:0'],
                'image' => ['image'],
                'genre' => 'required',
                'pegi' => 'required'
            ]);
            $game->genre_id = $request->genre;
        }else{ //genre baru
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'price' => ['numeric','required','gte:0'],
                'image' => ['image'],
                'newGenre' => ['required','unique:genres,name'],
                'pegi' => 'required'
            ]);
            $genres->name = $request->newGenre;
            $genres->save();
            $game->genre_id = $genreCheckID->id += 1;
        }

        $game->title = $request->title;
        $game->description = $request->description;
        $game->price = $request->price;
        // $game->genre_id = $request->genre;
        $game->rating = $request->pegi;

        $file = $request->file('image');
        if($file != null){
            $imageName = time().'.'.$file->getClientOriginalExtension();

            Storage::putFileAs('public/images', $file, $imageName);

            Storage::delete('public/'.$game->image);

            $game->image = 'images/'.$imageName;
        }

        $game->save();
        return redirect('/gameManage');
    }


}
