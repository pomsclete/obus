<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ParentMidlleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and has the 'parent' role
        if ($request->user() || $request->user()->hasRole('parent')) {
            return $next($request);
        } else {
            return redirect()->route('login')->with('error', 'Access denied. Parents only.');
        }
    }
}
