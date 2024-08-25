@extends('layouts')
@section('title', 'Add New Task')
@section('content')
    <div class="container ">
        <h1>Add new task</h1>
            <div class="mb-3 row">
                <label for="task-name" class="col-sm-2 col-form-label">Task Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="task_name">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="date" class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="date">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="priority" class="col-sm-2 col-form-label">Priority</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Priority">
                        <option value="1">Low</option>
                        <option value="2">Medium</option>
                        <option value="3">High</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status-done" value="1" checked>
                        <label class="form-check-label" for="status-done">
                            Done
                        </label>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status-undone" value="0">
                        <label class="form-check-label" for="status-undone">
                            Undone
                        </label>
                    </div>
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
                url: '{{ route('task.store') }}',
                dateType: 'json',
                data: {
                    _token: '{{ csrf_token() }}',
                    task_name: $("#task_name").val(),
                    date: $("#date").val(),
                    priority: $("#priority").val(),
                    status: $('input[name=status]:checked').val()
                }
            });
        });
    </script>
@endsection
