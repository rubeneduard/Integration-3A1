<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if ($role == '1' && auth()->user()->role != '1' ) {
            abort(403);
        }
        if ($role == '2' && auth()->user()->role != '2' ) {
            abort(403);
        }
        if ($role == '3' && auth()->user()->role != '3' ) {
            abort(403);
        }
        return $next($request);
    }
}
