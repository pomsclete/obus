<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EtudiantMidlleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and has the 'etudiant' role
        if ($request->user() || $request->user()->hasRole('etudiant')){
            return $next($request);
        } else {
            return redirect()->route('login')->with('error', 'Access denied. Etudiants only.');
        }
        
    }
}
