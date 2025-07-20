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
        $userRole = session()->get('userRole');
        if (!in_array($userRole, $roles)) {
            return redirect('/dashboard')->with('denied', 'Anda tidak diizinkan mengakses halaman ini!');
            // abort(403,'Anda tidak memiliki izin!');
        }
        return $next($request);
    }
}
