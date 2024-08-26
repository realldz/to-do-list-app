<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Auth;
use Exception;
use Illuminate\Http\Request;
use Response;

class TodoController extends Controller
{
    public function create() {
        return view('taskInfo');
    }
    public function edit(Todo $task) {
        return view('taskInfo', [
            'task' => $task
        ]);
    }
    public function store(TodoRequest $request) {
        // dd($request->validated());
        try {
            Auth::user()->todo()->create($request->validated());
            return $this->success('Created successfully');
        } catch (Exception $e) {
            return $this->fail($e->getMessage());
        }
    }
    public function update(TodoRequest $request, Todo $task) {
        try {
            $task->update($request->validated());
            return $this->success('Edit successfully');
        } catch (Exception $e) {
            return $this->fail($e->getMessage());
        }
    }

    public function markAsDone(Todo $task) {
        try {
            $task->update(['status' => 1]);
            return $this->success('Update successfully');
        } catch (Exception $e) {
            return $this->fail($e->getMessage());
        }
    }
    public function delete(Todo $task) {
        try {
            $task->delete();
            return $this->success('Delete successfully');
        } catch (Exception $e) {
            return $this->fail($e->getMessage());
        }
    }
}
