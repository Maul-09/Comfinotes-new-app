<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
{
    if (!Auth::check()) {
        return redirect()->route('login')
            ->withErrors(['error' => 'Silakan signin terlebih dahulu']);
    }

    return $next($request);
}
}
