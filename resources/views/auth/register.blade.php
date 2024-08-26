@extends('auth.layouts')
@section('title', 'Register')
@section('content')
    <div>
        <form action="{{ route('auth.register') }}" method="post">
            <h1 class="h3 mb-3 ">Register</h1>
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $e)
                        {{ $e }} <br>
                    @endforeach
                </div>
            @endif
            @csrf
            <div class="form-floating mb-1">
                <input type="username" class="form-control" id="floatingInput" placeholder="Username" name="username">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating mt-1">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating mt-1 mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password_confirmation">
                <label for="floatingPassword">Confirm Password</label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
            <div class="mt-1">
                <span>Already have account? <a href="{{ route('auth.login') }}">Login</a></span>
            </div>
        </form>
    </div>
@endsection
