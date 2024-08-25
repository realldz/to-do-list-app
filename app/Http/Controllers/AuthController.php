<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use Validator;
class AuthController extends Controller
{
    public function login(Request $request) {
        if (!$request->isMethod('POST')) {
            return view('auth.login');
        }
        // dd($request->all());
        $validator = Validator::make($request->all(), ['username' => 'required', 'password' => 'required']);
        if ($validator->fails()) {
            redirect()->back()->withInput()->withErrors($validator->errors());
        }
        // dd($validator->validated());
        if (!Auth::attempt($validator->validated())) {
            return redirect()->back()->withInput()->withErrors('Username or password is incorrect');
        }
        return redirect()->back();

    }
    public function register(Request $request) {
        return view('auth.register');
    }
}
