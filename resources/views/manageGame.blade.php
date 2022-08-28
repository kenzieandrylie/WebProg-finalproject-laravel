@extends('layout')

@section('title','Manage Game')

@section('halaman')
<div class="d-flex flex-row-reverse">
    <a class="btn btn-primary col-2 mb-4" href="/addGamePage">Add Game</a>
</div>

<table class="table align-middle">
    <tr>
        <th scope="col">GAME TITTLE</th>
        <th scope="col">PEGI RATING</th>
        <th scope="col">GAME GENRE</th>
        <th scope="col">GAME PRICE</th>
        <th scope="col"></th>
    </tr>
    @foreach ($games as $g)
    <tr>
        <td class="align-item-center">
            <img style="border-radius: 50%;
        height: 50px; width: 50px;
        " src="../storage/{{$g->image}}" class="mx-auto me-2" alt="...">
            {{$g->title}}
        </td>
        <td>{{$g->rating}}</td>
        <td>
            <span class="rounded-pill p-1 text-success ps-3 pe-3" style="background-color: rgb(187, 245, 190)">
                {{$g->genre->name}}
            </span>
        </td>
        <td>
            @if ($g->price == 0)
                Free
            @else
                $ {{$g->price}}
            @endif
        </td>
        <td>
            <div class="d-flex">
                <a class="btn btn-outline-primary me-2" href="/edit-game-page/{{$g->id}}">Edit</a>
                <form action="/delete-game/{{$g->id}}" method="post">
                    {{method_field('delete')}}
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
            </div>
        </td>
    </tr>
    @endforeach
</table>

@endsection
