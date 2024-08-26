@extends('layouts')
@section('title', 'Profile')
@section('content')
    <div class="container">
        <h1>Profile</h1>
        <div class="mb-3 row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="username" value="{{ $user->username }}" disabled>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="reg_date" class="col-sm-2 col-form-label">Registered at</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="registered" value="{{ $user->created_at }}" disabled>
            </div>
        </div>
        <hr>
        <h3>Change password</h3>
        <div class="mb-3 row">
            <label for="old_password" class="col-sm-2 col-form-label">Old password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="old_password">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="new_password" class="col-sm-2 col-form-label">New password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="new_password">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="new_password_confirmation" class="col-sm-2 col-form-label">New password Confirmation</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="new_password_confirmation">
            </div>
        </div>
        <div class="mx-0 row">
            <button id="save_btn" type="button" class="btn btn-primary">Save</button>
        </div>
    </div>
    <script>
        $("#save_btn").click(function() {
            console.log('click');
            $.ajax({
                method: 'POST',
                url: '{{ route('profile') }}',
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}',
                    old_password: $("#old_password").val(),
                    new_password: $("#new_password").val(),
                    new_password_confirmation: $("#new_password_confirmation").val(),
                },
                success: function(result) {
                    Swal.fire({
                        text: result.message,
                        icon: "success"
                    }).then(() => window.location.reload());
                },
                error: function(result) {
                    Swal.fire({
                        text: result.responseJSON.message,
                        icon: "error"
                    }).then(() => window.location.reload());
                },
            })
        });
    </script>
@endsection
