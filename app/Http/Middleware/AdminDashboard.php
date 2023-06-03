<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminDashboard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect('/login');
        } else {
            $user = auth()->user();
            if ($user->hasRole(3) || $user->hasRole(2) || $user->hasRole(6) || $user->hasRole(5)) {
                return $next($request);
            } else {
                return redirect('/');
            }
        }
    }
}
