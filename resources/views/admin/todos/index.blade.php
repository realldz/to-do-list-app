@extends('admin.layout')
@section('title', 'Tasks')
@section('main')
    @include('admin.components.contentHeader', ['headerName' => 'Tasks'])
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">@sortablelink('id', '#')</th>
                                <th>Task name</th>
                                <th>User</th>
                                <th>Status</th>
                                <th style="width: 40px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($todos as $todo)
                                <tr>
                                    <td>{{ $todo->id }}</td>
                                    <td>{{ $todo->task_name }}</td>
                                    <td>{{ $todo->user->username}}</td>
                                    <td>{{ $todo->status ? 'Done' : 'Undone'}}</td>
                                    <td>
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu" style="">
                                            <a class="dropdown-item" href="{{ route('admin.user.info', $todo->id ) }}">Edit</a>
                                            <a class="dropdown-item" href="#">View tasks</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
                <div class="card-footer float-right clearfix">
                    {{ $todos->links() }}
                </div>
            </div>
        </div>
    </section>


@endsection
