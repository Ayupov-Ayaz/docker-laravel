<?php

namespace App\Http\Middleware;

use App\Entities\Role;
use App\Entities\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param role
     * @return mixed
     */
    public function handle($request, Closure $next,Role $role)
    {
        if(! $request->user()->hasRole($role)) { //TODO: реализовать
            return redirect('/home');
        }
        return $next($request);
    }
}
