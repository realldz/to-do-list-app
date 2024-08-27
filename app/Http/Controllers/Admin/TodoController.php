<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(Request $request) {
        $query = Todo::query();
        return view('admin.todos.index',[
            'todos' => $query->sortable(['id' => 'desc'])->simplePaginate(5),
        ]);
    }
}
