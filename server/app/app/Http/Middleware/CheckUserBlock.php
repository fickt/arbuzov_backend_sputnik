<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Mockery\Exception;
use Symfony\Component\HttpFoundation\Response;

class CheckUserBlock
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        var_dump(Auth::user()->is_blocked);
        return Auth::user()->is_blocked
            ? throw new Exception('Your account has been suspended!')
            : $next($request);
    }
}
