<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleMiddleware {

    public function handle($request, Closure $next, $role){
        if($request->user()->hasRole($role) ){
           return redirect('profile'); 
        }
        return $next($request);
    }
}