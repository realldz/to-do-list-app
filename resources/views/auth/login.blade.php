@extends('auth.layouts')
@section('title', 'Login')
@section('content')
    <div>
        <h1 class="h3 mb-3 ">Sign in</h1>
        <form action="{{ route('auth.login') }}" method="POST">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $e)
                        {{ $e }} <br>
                    @endforeach
                </div>
            @endif
            @if (Session::get('successMsg'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('successMsg') }} 
            </div>
            @endif
            <div class="form-floating mb-1">
                <input type="username" name="username" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating mt-1">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" name="remember" value="1" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Remember me
                </label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
            <div class="mt-1">
                <span>Don't have account? <a href="{{ route('auth.register') }}">Register</a></span>
            </div>
        </form>
    </div>
@endsection
