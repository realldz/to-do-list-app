<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(Request $request) {
        $user = Auth::user();
        if ($request->isMethod('POST')) {
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|confirmed',
            ]);
            if(!Hash::check($request->old_password, $user->password)){
                return $this->fail('Old password is incorrect!');
            }

            $user->password = Hash::make($request->new_password);
            if($user->save()) {
                return $this->success('Update successfully');
            }
            return $this->fail('Update failed');
        }
        return view('profile', [
            'user' => $user,
        ]);
    }
}
