@extends('layout')

@section('title','home')

@section('halaman')

@if(session()->has('suksesaddtocart'))
<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    {{session('suksesaddtocart')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row row-cols-1 row-cols-md-5 g-4">
    @foreach ($games as $g)
    <div class="col-md justify-content-center">
        <div class="card h-100 text-center">
        <img style="border-radius: 50%;
        height: 100px; width: 100px; object-fit: cover; margin-top: 20px
        " src="../storage/{{$g->image}}" class="card-img-top mx-auto" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$g->title}}</h5>
                <a href="/details/{{$g->id}}" class="rounded-pill p-1 text-success ps-3 pe-3 btn stretched-link" style="background-color: rgb(187, 245, 190)">{{$g->genre->name}}</a>
                <hr>
                @if ($g->price == 0)
                    <p class="card-text">Free</p>
                @else
                    <p class="card-text">${{$g->price}}</p>
                @endif
            </div>
        </div>
    </div>
    @endforeach

</div>

<div class="container">
    <hr>
    <div class="row mt-5">
        <div class="col">
            <p>
                Showing <b>{{$games->firstItem()}}</b> to <b>{{$games->lastItem()}}</b> of <b>{{$games->total()}}</b> results
            </p>
        </div>
        <div class="col d-flex justify-content-end">
            {{ $games->links() }}
        </div>
    </div>
</div>



@endsection
