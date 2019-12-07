<?php

namespace App\Http\Middleware;

use Closure;

class CustomAuth
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
        if(!$request->session()->has('user')){
            return redirect()->route('login.show')->with('errorLogin', 'Hãy đăng nhập trước khi thực hiện hành động này');
        }
        return $next($request);
    }
}
