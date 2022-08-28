@extends('layout')

@section('title','Detail')

@section('halaman')

<div class="container">
    <div class="jumbotron bg-image text-light p-5 rounded" style="background-image: url('../storage/{{$game->image}}'); background-size: cover">
        <h1 class="display-4 fw-bold text-center p-5">{{$game->title}}</h1>
        <div class="bg-dark p-5 rounded bg-opacity-75">
            <div class="row mb-5">
                <div class="col-md-6 fs-5">
                    <span class="rounded-pill p-1 text-success ps-3 pe-3" style="background-color: rgb(187, 245, 190)">
                        {{$game->genre->name}}
                    </span>
                </div>
                <div class="col-md-6 d-flex flex-row-reverse">
                    <div class="fs-2 fw-bold text-info p-1">
                        ${{$game->price}}
                    </div>
                    <div class="fs-2 fw-bold bg-danger border border-dark rounded me-3 p-1">
                        {{$game->rating}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 fs-5">
                    <p>{{$game->description}}</p>
                </div>
                <div class="col-md-6 fs-3 d-flex flex-row-reverse">
                    <form action="/addCart" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$game->id}}">
                        <button class="btn btn-primary btn-lg" type="submit">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
