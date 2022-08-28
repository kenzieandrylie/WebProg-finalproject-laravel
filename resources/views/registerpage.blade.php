@extends('layout')

@section('title','login')

@section('halaman')
    <div class="col-md-5 bg-light p-5">
        <div class="text-center p-5">
            <h3>Game<span class="text-danger fw-bold">SLot</span></h3>
            <p class="fw-bold">Sign up your account</p>
        </div>
        <form action="/register" method="post">
            @csrf
            <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>

            <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{old('email')}}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>

            <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" name="password">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Gender</label>
                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="inlineRadio1" value="male">
                        <label class="form-check-label">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="inlineRadio2" value="female">
                        <label class="form-check-label">Female</label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Date of Birth</label>
                <input type="date" class="form-control @error('dob') is-invalid @enderror" id="exampleInputPassword1" name="dob" value="{{old('dob')}}">
                @error('dob')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%">Sign Up</button>
        </form>
    </div>
@endsection
