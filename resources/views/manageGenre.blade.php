@extends('layout')

@section('title','Manage Genre')

@section('halaman')

<table class="table align-middle">
    <tr>
        <th scope="col">GAME GENRE</th>
        <th scope="col"></th>
    </tr>
    @foreach ($genre as $g)
    <tr>
        <td>{{$g->name}}</td>
        <td>
            <div class="d-flex flex-row-reverse">
                <a class="btn btn-outline-primary me-2" href="/edit-genre-page/{{$g->id}}">Edit</a>
            </div>
        </td>
    </tr>
    @endforeach
</table>

@endsection
