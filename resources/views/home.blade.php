@extends('layouts')
@section('title', 'Home')
@section('content')
    <style>
        #add-new-task {
            float: right;
            margin-bottom: 5px;
            margin-top: 5px;
        }
    </style>
    <a href="{{ route('task.create') }}"><button type="button" id="add-new-task" class="btn btn-primary">Add new
            task</button></a>
    <h1>All tasks</h1>
    <div class="bd-example">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th scope="col">@sortablelink('id', '#')</th>
                    <th scope="col">Task</th>
                    <th scope="col">@sortablelink('date', 'Date')</th>
                    <th scope="col">@sortablelink('priority', 'Priority')</th>
                    <th scope="col">@sortablelink('status', 'Status')</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todos as $todo)
                    <tr>
                        <th scope="row">{{ $todo->id }}</th>
                        <td>{{ $todo->task_name }}</td>
                        <td>{{ $todo->date }}</td>
                        <td>{{ $todo->priority }}</td>
                        <td>{{ $todo->status ? '✅' : '❌' }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:markAsDone({{ $todo->id }})">Mark as
                                            done</a></li>
                                    <li><a class="dropdown-item" href="{{ route('task.edit', $todo->id) }}">Edit</a></li>
                                    <li><a class="dropdown-item" href="javascript:destory({{ $todo->id }})">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $todos->links() !!}
    </div>
    <script>
        function markAsDone(id) {
            $.ajax({
                method: 'GET',
                url: '{{ route('task.markAsDone', '') }}' + '/' + id,
                dateType: 'json',
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
            });;
        };
 
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
                        url: '{{ route('task.delete', '') }}' + '/' + id,
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
