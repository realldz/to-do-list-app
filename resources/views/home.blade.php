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

    <button type="button" id="add-new-task" class="btn btn-primary">Add new task</button>
    <h1>All tasks</h1>
    <div class="bd-example">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Task</th>
                    <th scope="col">Date</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Do housework</td>
                    <td>01/01/2025 12:00:00</td>
                    <td>High</td>
                    <td>✅</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Action
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Mark as done</a></li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                <li><a class="dropdown-item" href="#">Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>

@endsection
