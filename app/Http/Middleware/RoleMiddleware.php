<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param \Closure $next
     * @param string $roles
     */

    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('/login');
        }
        if ($roles && !in_array(Auth::user()->role, $roles)) {
            return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
        }
        return $next($request);
    }
}
