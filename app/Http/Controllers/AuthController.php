<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
    public function login(Request $request) {
        return view('auth.login');
    }
    public function register(Request $request) {
        return view('auth.register');
    }
}
