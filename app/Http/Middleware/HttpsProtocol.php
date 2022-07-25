<?php

namespace App\Http\Middleware;
 
use Closure;

class HttpsProtocol
{
    /**
     * Handle an incoming request.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    \Closure  $next
     * @return  mixed
     */
    public function handle($request, Closure $next)
    {
        if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&  $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'http'
         && \App::environment() === 'production') {
            return redirect()->secure($request->getRequestUri());
        }
    }
}
