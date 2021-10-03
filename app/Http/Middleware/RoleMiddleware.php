<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleMiddleware {

    public function handle($request, Closure $next){
        if(! $request->user()->is_admin() ){
           return redirect('profile'); 
        }
        return $next($request);
    }
}