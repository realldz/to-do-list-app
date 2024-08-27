@extends('admin.layout')
@section('title', 'Users')
@section('main')
    @include('admin.components.contentHeader', ['headerName' => 'Users'])
    <section class="content">
        <div class="container-fluid">
            <div class="card">

                <form method="POST" action="{{ route('admin.user.update', $user->id) }}">
                    @method('PUT')

                    <div class="card-body">
                        @if (Session::get('successMsg'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('successMsg') }} 
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->all() as $e)
                                    {{ $e }} <br>
                                @endforeach
                            </div>
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="is_admin" name="is_admin">
                            <label class="form-check-label" for="is_admin">Is Admin?</label>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $("#username").val('{{ $user->username }}')
            @if ($user->is_admin)
                , $("#is_admin").click();
            @endif
        });
    </script>
@endsection
