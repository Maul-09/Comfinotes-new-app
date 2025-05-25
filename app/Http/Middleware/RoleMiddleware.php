<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role = null)
    {
        if (!Auth::check()) {
            dd('middleware jalan');
            return redirect()->route('login');
        }

        if (Auth::user()->role !== $role) {
            abort(403, 'Akses ditolak.');
        }

        return $next($request);
    }
}
