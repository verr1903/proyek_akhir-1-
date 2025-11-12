<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // cek apakah role user ada dalam daftar roles
        if (!in_array($user->role, $roles)) {
            abort(403, 'Akses ditolak — Anda tidak memiliki izin untuk membuka halaman ini.');
        }

        return $next($request);
    }
}
