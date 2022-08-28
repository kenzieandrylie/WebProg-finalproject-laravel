@extends('layout')

@section('title','Update Genre')

@section('halaman')

<div class="col-md-10 bg-light p-5">
    <div class="pb-5">
        <h3>Update Genre</h3>
    </div>
    <form action="/edit-genre-page" method="post">
        @csrf
        <div class="row mb-4">
          <label class="col-sm-4 col-form-label">Game Genre</label>
          <div class="col-sm-8">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$genre->name}}">
          </div>
        </div>

        <div class="d-flex flex-row-reverse">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        <input type="hidden" name="id" value="{{$genre->id}}">
      </form>
</div>
@endsection
