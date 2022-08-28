@extends('layout')

@section('title','addgame')

@section('halaman')
<div class="col-md-10 bg-light p-5">
    <div class="pb-5">
        <h3>Add Game</h3>
    </div>
    <form action="/add" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mb-2">
          <label class="col-sm-4 col-form-label">Game Title</label>
          <div class="col-sm-8">
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title')}}">
          </div>
        </div>
        {{-- Errors --}}
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-8 fst-italic text-danger">
                @error('title')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <hr>
        <div class="row mb-2">
          <label class="col-sm-4 col-form-label">Photo</label>
          <div class="col-sm-8">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="formFile" name="image"  value="{{old('image')}}">
          </div>
        </div>
        {{-- Errors --}}
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-8 fst-italic text-danger">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <hr>
        <div class="row mb-2">
            <label class="col-sm-4 col-form-label" >Game Description</label>
            <div class="col-sm-8">
               <textarea class="form-control @error('description') is-invalid @enderror" name="description" value="{{old('description')}}" rows="3"></textarea>
            </div>
        </div>
        {{-- Errors --}}
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-8 fst-italic text-danger">
                @error('description')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <hr>
        <div class="row mb-2">
            <label class="col-sm-4 col-form-label">Game Price</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <div class="input-group-text">$</div>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="must be number"  value="{{old('price')}}">
                </div>
            </div>
            {{-- Errors --}}
        </div>
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-8 fst-italic text-danger">
                @error('price')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <hr>
        <div class="row mb-2">
            <label class="col-sm-4 col-form-label">Game Genre</label>
            <div class="col-sm-8">
                <select onchange="addGenreField(this.value)" class="form-select" aria-label="Default select example" name="genre">
                    @foreach ($genres as $genre)
                        <option value="{{$genre->id}}">{{$genre->name}}</option>
                    @endforeach
                    <option value="others">Add new genre</option>
                </select>
            </div>
        </div>
        {{-- Errors --}}
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-8 fst-italic text-danger">
                @error('genre')
                    {{ $message }}
                @enderror
            </div>
        </div>


        {{-- Add New Genre --}}
        <div class="row mb-2" id="newGenre" style="display: none;">
            <label class="col-sm-4 col-form-label">Add New Genre</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="newGenre">
            </div>
        </div>

        {{-- Errors --}}
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-8 fst-italic text-danger">
                @error('newGenre')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <hr>

        <div class="row mb-2">
            <label class="col-sm-4 col-form-label">PEGI Rating</label>
            <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" name="pegi">
                    <option selected value="0">0</option>
                    <option value="3">3</option>
                    <option value="7">7</option>
                    <option value="12">12</option>
                    <option value="16">16</option>
                    <option value="18">18</option>
                </select>
            </div>
        </div>
        {{-- Errors --}}
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-8 fst-italic text-danger">
                @error('pegi')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <hr>

        <div class="d-flex flex-row-reverse">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
    <script>
        function addGenreField(param){
            if(param == "others"){
                document.getElementById("newGenre").style.display='flex';
            }else{
                document.getElementById("newGenre").style.display='none';
            }
        }
    </script>
</div>
@endsection
