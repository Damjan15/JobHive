<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if ($request->user()->role !== $role) {
            if ($request->user()->role === 'company') {
                return redirect()->route('company.dashboard');
            } else if ($request->user()->role === 'candidate') {
                return redirect()->route('candidate.dashboard');
            }
        }
        return $next($request);
    }
}
