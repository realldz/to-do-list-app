@extends('auth.layouts')
@section('title', 'Login')
@section('content')
    <div>
        <h1 class="h3 mb-3 ">Sign in</h1>
        <div class="form-floating mb-1">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mt-1">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Remember me
            </label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        <div class="mt-1">
            <span>Don't have account? <a href="#">Register</a></span>
        </div>
    </div>
@endsection
