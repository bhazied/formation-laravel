<?php

namespace App\Http\Middleware;

use Closure;

class changeContent
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
        $response  = $next($request);
        $response->setContent('my fake response');
        return $response;
        //return $next($request);
    }
}
