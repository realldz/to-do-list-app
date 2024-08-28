<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Exception;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(Request $request) {
        $query = Todo::query();
        $request->whenFilled('user', function ($user) use ($query) {
            $query->where('user_id', $user);
        });
        return view('admin.todos.index',[
            'todos' => $query->sortable(['id' => 'desc'])->simplePaginate(5),
        ]);
    }

    public function edit(Todo $task) {
        return view('admin.todos.todoInfo', [
            'task' => $task,
        ]);
    }

    public function update(Request $request, Todo $task) {
        try {
            $task->task_name = $request->task_name;
            $task->status = $request->status;
            $task->priority = $request->priority;
            $task->date = $request->date;
            if ($task->save()) {
                return redirect()->back()->with('successMsg', 'Task updated successfully');
            }
            return redirect()->back()->withErrors('Task update failed');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function delete(Todo $task) {
        try {
            $task->delete();
            return $this->success('Task deleted successfully');
        } catch (Exception $e) {
            return $this->fail($e->getMessage());
        }
    }

}
