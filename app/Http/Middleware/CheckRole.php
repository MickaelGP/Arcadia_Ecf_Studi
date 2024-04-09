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
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        try {
            $user = auth()->user();
            
            // Vérifie si le rôle de l'utilisateur correspond à l'un des rôles autorisés
            foreach ($roles as $role) {
                if ($user->role->label === $role) {
                    return $next($request);
                }
            }

            // Si aucun des rôles autorisés n'a été trouvé, renvoie une réponse 403
            return response()->json(['message' => 'Accès non autorisé.'], 403);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Accès non autorisé.'], 403);
        }
    }
}
