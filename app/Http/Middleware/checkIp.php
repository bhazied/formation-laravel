<?php

namespace App\Http\Middleware;

use Closure;

class checkIp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next , $authIp = [])
    {
        $ip = $request->ip();
        if($ip != '127.0.0.1' && !in_array($ip, $authIp)){
            return response('not allowed to show this app');
        }
        return $next($request);
    }
}
