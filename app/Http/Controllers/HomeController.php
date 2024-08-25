<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
class HomeController extends Controller
{
    public function index(Request $request) {
        $todos = Todo::all();
        return view('home', [
            'todos' => $todos,
        ]);
    }
}
