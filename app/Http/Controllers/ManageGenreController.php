<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ManageGenreController extends Controller
{
    public function index(){
        $genre = Genres::all();

        return view('manageGenre', compact('genre'));
    }

    public function editGenrePage(Request $request){
        $genre = Genres::find($request->id);

        return view('editGenre', compact('genre'));
    }

    public function editGenre(Request $request){
        $genre = Genres::find($request->id);
        // dd($genre);

        $request->validate([
            'name' => ['required',
            Rule::unique('genres')->ignore($request->id),
        ],
        ]);

        $genre->name = $request->name;

        $genre->save();
        return redirect('/genreManage');
    }
}
