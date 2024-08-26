<?php

namespace App\Http\Middleware;

use App\Models\Todo;
use Auth;
use Closure;
use Illuminate\Http\Request;

class VerifyTaskOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $todo_user_id = $request->route()->parameters()['task']->user_id;
        // dd($todo_user_id);
        $user_id = Auth::user()->id;
        if ($todo_user_id != $user_id) {
            return response('Unauthorized', 401);
        }
        return $next($request);
    }
}
