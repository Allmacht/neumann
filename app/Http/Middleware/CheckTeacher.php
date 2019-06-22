<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\User;

use Closure;

class CheckTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->hasRole('Docente')):
          if(Auth::user()->authorized == false){
            return redirect()->route('CheckTeacher');
          }
        endif;
        
        return $next($request);
    }
}
