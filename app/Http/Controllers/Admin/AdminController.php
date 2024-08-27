<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index', [
            'userCount' => User::count(),
            'taskCount' => Todo::count(),
            'todayRegistered' => User::whereDate('created_at', date('Y-m-d'))->count(),
            'todayTasksCreated' => Todo::whereDate('created_at', date('Y-m-d'))->count(),
        ]);
    }
}
