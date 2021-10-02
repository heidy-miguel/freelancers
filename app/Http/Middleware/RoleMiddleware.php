<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleMiddleware {

    public function handle($request, Closure $next, $roles){
        if(!$request->user()->hasAnyRole($roles)){
           abort(403); 
        }
        return $next($request);
    }
}