<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     * Check the allowed role of routes
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$role): Response
    {
        return in_array($request->user()['role'], $role)
            ? $next($request)
            : abort(redirect()->back()->with('Warning', 'Unauthorized action! Calling 911.'));
    }
}