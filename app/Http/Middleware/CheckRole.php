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
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('auth.login.form');
        }

        // Obtener el rol del usuario
        $userRole = Auth::user()->role->type;

        // Verificar si el rol del usuario coincide con el rol requerido
        if ($userRole !== $role) {
            session()->flash('feedback.message', 'No tienes permiso para acceder a esta página.');
            session()->flash('feedback.type', 'danger');
            return redirect()->route('home');
        }

        return $next($request);
    }
}
