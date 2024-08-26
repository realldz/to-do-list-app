<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
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
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'username' => 'required', 
                'password' => 'required|min:6|confirmed',
            ]);
            if ($validator->fails()) {
                redirect()->back()->withInput()->withErrors($validator->errors());
            }
            $user = $validator->validated();
            if ($user) {
                User::create([
                    'username' => $user['username'],
                    'password' => Hash::make($user['password']),
                    'is_admin' => 0,
                ]);
                return redirect()->route('auth.login')->with('successMsg', 'Account has been created, please login');
            }
            return redirect()->back();
        }
        return view('auth.register');
    }
}
