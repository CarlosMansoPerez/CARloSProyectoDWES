<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckBorrado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->hasHeader('X-Swal-Button')) {
            // Si el botón no está presente en la solicitud, redirige al usuario
            return redirect()->back()->with('error', 'Acceso no autorizado.');
        }
    
        // Si el botón está presente, continúa con la ejecución de la función.
        return $next($request);
    }
}
