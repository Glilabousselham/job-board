<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $shouldBeLogin = true): Response
    {
        if (auth()->check() !== $shouldBeLogin)
            return response()->redirectTo($shouldBeLogin ? '/login' : "signup");
        return $next($request);
    }
}