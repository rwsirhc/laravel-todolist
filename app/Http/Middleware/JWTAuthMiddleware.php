<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class JWTAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // ;
        // $token = explode(" ", $header);
        // print_r($token);
        if (!$header = $request->header('Authorization')) {
            return response()->json(["status" => 401, "message" => 'Unauthorized'], 401);
        }
        return $next($request);
    }
}
