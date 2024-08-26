<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use App\Models\Todo;
class HomeController extends Controller
{
    public function index(Request $request) {
        $todos = Auth::user()->todo();
 
        // dd($todos);
        return view('home', [
            'todos' => $todos->sortable(['status' => 'asc'])->simplePaginate(5),
        ]);
    }
}
