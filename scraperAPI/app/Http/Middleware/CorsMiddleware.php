<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    public function handle($request, Closure $next)
    {
        $domains = ['http://localhost:5173','http://localhost:8000','http://localhost:8080'];

        if (isset($request->server()['HTTP_ORIGIN'])) {
            $origin = $request->server()['HTTP_ORIGIN'];
            if (in_array($origin, $domains)) {
                header('Access-Controll-Allow-Origin: ' . $origin);
                header('Access-Controll-Allow-Headers: Origin, Content-Type, Authorization');
            }
        }
        return $next($request);
    }
}
