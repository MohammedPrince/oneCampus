<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
public function handle(Request $request, Closure $next, ...$roles)
{
    // 1. If not logged in → Login
    if (!Auth::check()) {
        return redirect('/login')->with('error', 'Please log in first.');
    }

    // 2. If no roles provided → Allow access (useful for optional role checks)
    if (empty($roles)) {
        return $next($request);
    }

    // 3. If user lacks required roles → Deny access
    if (!$request->user()->hasAnyRole($roles)) {
        return redirect('user.list')->with('error', 'Access denied.');
    }

    // 4. Otherwise, proceed
    return $next($request);
}
}
