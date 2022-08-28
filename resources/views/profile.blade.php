@extends('layout')

@section('title','profile')

@section('halaman')

{{-- Profile --}}
<div class="col-md-10 bg-light p-5">
    <div class="pb-5">
        <h3>Profile</h3>
    </div>
    <form action="/editProfile" method="post" enctype="multipart/form-data">

        @if(session()->has('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('sukses')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif


        @csrf
        <div class="row mb-3">
          <label class="col-sm-4 col-form-label">Name</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
          </div>
          @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
        </div>
        <hr>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label">Photo</label>
            <div class="col-sm-8">
              <input class="form-control @error('image') is-invalid @enderror" type="file" id="formFile" name="image">
            </div>
        </div>
        <hr>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8">
              <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-8 fst-italic text-danger">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <hr>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label">Gender</label>
            <div class="col-sm-8">
              <input type="text" readonly disabled class="form-control-plaintext" name="gender" value="{{Auth::user()->gender}}">
            </div>
          </div>
        <hr>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label">Date of Birth</label>
            <div class="col-sm-8">
              <input type="text" readonly disabled class="form-control-plaintext" name="dob" value="{{Auth::user()->dob}}">
            </div>
          </div>
        <hr>

        <div class="d-flex flex-row-reverse">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        {{-- <input type="hidden" name="id" value="{{$game->id}}"> --}}
      </form>
</div>


{{-- Account --}}
<div class="col-md-10 bg-light p-5 mt-5">
    <div class="pb-5">
        <h3>Account</h3>
    </div>

      <form action="/editPass" method="post">

        @if(session()->has('declined'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('declined')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @csrf
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label">Old Password</label>
            <div class="col-sm-8">
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-8 fst-italic text-danger">
                @error('password')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <hr>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label ">New Password</label>
            <div class="col-sm-8">
              <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-8 fst-italic text-danger">
                @error('new_password')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <hr>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label">Confirm Password</label>
            <div class="col-sm-8">
              <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-8 fst-italic text-danger">
                @error('confirm_password')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <hr>

        <div class="d-flex flex-row-reverse">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>

</div>

@endsection
