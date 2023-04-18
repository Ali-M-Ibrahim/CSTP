<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
//        if($request->type != 'en'){
//            return redirect(Route('login'));
////            abort('404');
//        }
        if(Auth::check()){
            if(Auth::user()->isActive==1){
                return $next($request);
            }else{
                return redirect(Route('login'));
            }
        }else{
            return redirect(Route('login'));
        }

    }
}
