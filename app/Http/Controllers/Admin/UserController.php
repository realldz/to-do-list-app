<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    public function index(Request $request) {
        $query = User::query();
        return view('admin.users.index',[
            'users' => $query->sortable(['id' => 'asc'])->simplePaginate(5),
        ]);
    }
    public function edit(User $user) {
        return view('admin.users.userInfo', [
            'user' => $user,
        ]);
    }
    public function update(Request $request, User $user) {
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->username = $request->username;
        $user->is_admin = $request->is_admin == 'on' ? true : false;
        if ($user->save()) {
            return redirect()->back()->with('successMsg', 'Update successful!');
        }
        return redirect()->back()->withErrors('Update failed!');
    }
}
