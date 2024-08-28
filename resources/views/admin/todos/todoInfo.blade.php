@extends('admin.layout')
@section('title', 'Task')
@section('main')
    @include('admin.components.contentHeader', ['headerName' => 'Task'])
    <section class="content">
        <div class="container-fluid">
            <div class="card">

                <form method="POST" action="{{ route('admin.task.update', $task->id) }}">
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
                            <label for="task_name">Task Name</label>
                            <input type="text" class="form-control" id="task_name" name="task_name"
                                placeholder="task_name">
                        </div>
                        <div class="form-group">
                            <label for="priority">Priority</label>
                            {{-- <div class="col-sm-10"> --}}
                            <select class="form-select" aria-label="Priority" name="priority" id="priority">
                                <option value="1">Low</option>
                                <option value="2">Medium</option>
                                <option value="3">High</option>
                            </select>
                            {{-- </div> --}}
                        </div>
                        <div class="form-group">
                            <label for="date" class="">Date</label>
                            <div class="row">
                                <div class="col-2">
                                    <input type="date" class="form-control" id="date" name="date">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <div class="row">
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status-done"
                                            value="1" checked>
                                        <label class="form-check-label" for="status-done">
                                            Done
                                        </label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status-undone"
                                            value="0">
                                        <label class="form-check-label" for="status-undone">
                                            Undone
                                        </label>
                                    </div>
                                </div>
                            </div>
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
            @isset($task)
                $('#task_name').val('{{ $task->task_name }}');
                $('#date').val('{{ $task->date }}');
                $('#priority').val({{ $task->getAttributes()['priority'] }});
                $("input[name='status'][value='{{ $task->status }}']").click();
            @endisset
        });
    </script>
@endsection
