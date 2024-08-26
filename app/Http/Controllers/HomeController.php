<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
class HomeController extends Controller
{
    public function index(Request $request) {
        $todos = Todo::simplePaginate(5);
        // dd($todos);
        return view('home', [
            'todos' => $todos,
        ]);
    }
}
