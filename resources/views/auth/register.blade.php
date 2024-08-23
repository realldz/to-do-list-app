@extends('auth.layouts')
@section('title', 'Register')
@section('content')
    <div>
        <h1 class="h3 mb-3 ">Register</h1>
            <div class="form-floating mb-1">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mt-1">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating mt-1 mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Confirm Password</label>
            </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
        <div class="mt-1">
            <span>Already have account? <a href="{{ route('auth.login') }}">Login</a></span>
        </div>

    </div>
@endsection
