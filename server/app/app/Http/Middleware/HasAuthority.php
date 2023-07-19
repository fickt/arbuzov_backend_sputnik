<?php

namespace App\Http\Middleware;

use App\Enums\RolesEnum;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasAuthority
{
    /**
     * Ресурс может изменять только владелец ресурса, либо администратор
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     * @throws \Exception
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentUserId = $request->route('user');
        if (Auth::id() == $currentUserId || Auth::user()->role()->first()->name == RolesEnum::ADMIN) {
            return $next($request);
        } else {
            throw new \Exception("Unauthorized", Response::HTTP_UNAUTHORIZED);
        }
    }
}
