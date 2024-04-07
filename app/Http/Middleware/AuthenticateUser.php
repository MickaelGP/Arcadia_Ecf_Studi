<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if (!Auth::check()) {
            // L'utilisateur n'est pas connecté, redirection vers la page de connexion
            return redirect()->route('connexion');
        }
      

        // L'utilisateur est connecté, autorisation l'accès à la route
        return $next($request);
    }
}
