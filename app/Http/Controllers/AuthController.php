<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
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

        $validator = Validator::make($request->all(), ['username' => 'required', 'password' => 'required']);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        if (!Auth::attempt($validator->validated(), $request->input('remember'))) {
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
                return redirect()->back()->withInput()->withErrors($validator->errors());
            }
            $user = $validator->validated();
            if ($user) {
                if (User::where('username', '=', $user['username'])) {
                    return redirect()->back()->withErrors('This username already exists');
                }
                try {
                    User::create([
                        'username' => $user['username'],
                        'password' => Hash::make($user['password']),
                        'is_admin' => 0,
                    ]);
                } catch (Exception $e) {
                    return redirect()->back()->withErrors($e->getMessage());
                }
                return redirect()->route('auth.login')->with('successMsg', 'Account has been created, please login');
            }
            return redirect()->back();
        }
        return view('auth.register');
    }
}
