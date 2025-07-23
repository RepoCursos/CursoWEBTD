<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ModificaMayuscula
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $datos = $request->all(); //obtenemos los datos del request y lo guardamos 
        $datos['plataforma'] = strtoupper($request->plataforma); //indicamos en lo que venga en par clave-valor de plataforma lo modifique a mayuscula con el metodo strtoupper
        $request->replace($datos); //con el metodo replace remplasamos por la variable que le pasemos
        return $next($request);
    }
}
