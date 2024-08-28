@extends('admin.layout')
@section('title', 'Users')
@section('main')
    @include('admin.components.contentHeader', ['headerName' => 'Users'])
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <form action="{{ route('admin.user') }}" method="GET">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="number" name="id" class="form-control" id="id"
                                            placeholder="ID">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <input type="username" name="username" class="form-control" id="username"
                                            placeholder="Enter Username">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <select class="custom-select rounded-0" id="exampleSelectRounded0" name="is_admin">
                                            <option hidden value="">Is Admin</option>
                                            <option value="1">True</option>
                                            <option value="0">False</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>


                            </div>
                        </form>

                        <thead>
                            <tr>
                                <th style="width: 10px">@sortablelink('id', '#')</th>
                                <th>Username</th>
                                <th>Is Admin</th>
                                <th style="width: 40px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->is_admin ? 'True' : 'False' }}</td>
                                    <td>
                                        <button type="button" class="btn btn-default dropdown-toggle"
                                            data-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu" style="">
                                            <a class="dropdown-item"
                                                href="{{ route('admin.user.info', $user->id) }}">Edit</a>
                                            <a class="dropdown-item" href="{{ route('admin.task') }}?user={{ $user->id }}">View tasks</a>
                                            <a class="dropdown-item"
                                                href="javascript:destory('{{ $user->id }}')">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
                <div class="card-footer float-right clearfix">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </section>

    <script>
        function destory(id) {
            Swal.fire({
                text: 'Are you sure to delete?',
                icon: 'question',
                showConfirmButton: false,
                showDenyButton: true,
                showCancelButton: true,
                denyButtonText: `Delete`
            }).then((rs) => {
                if (rs.isDenied) {
                    $.ajax({
                        method: 'DELETE',
                        url: '{{ route('admin.user.delete', '') }}' + '/' + id,
                        dateType: 'json',
                        data: {
                            _token: '{{ csrf_token() }}'
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
                    });
                }
            });
        }
    </script>
@endsection
