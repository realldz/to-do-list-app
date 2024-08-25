<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Response;

class TodoController extends Controller
{
    public function create() {
        return view('taskInfo');
    }
    public function store(TodoRequest $request) {
        if (Todo::create($request->validated())) {
            return $this->success('Created task successfully');
        } else {
            return $this->fail($request->errors());
        }
    } 
}
