@extends('layout')

@section('title','login')

@section('halaman')

    @if(session()->has('sukses'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('sukses')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="col-md-5 bg-light p-5">
        <div class="text-center p-5">
            <h3>Game<span class="text-danger fw-bold">SLot</span></h3>
            <p class="fw-bold">Sign in to your account</p>
        </div>
        <form action="/login" method="post">
            @csrf

            <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="email"
            value="{{Cookie::get('email') !== null ? Cookie::get('email') : ""}}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>

            <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password"
            value="{{Cookie::get('password') !== null ? Cookie::get('password') : ""}}">
            </div>
            <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="remember">
            <label class="form-check-label">Remember me</label>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%">Sign In</button>
        </form>
    </div>
@endsection

