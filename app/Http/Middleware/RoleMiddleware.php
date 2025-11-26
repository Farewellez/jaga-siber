<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // 1. Cek User Login: Ambil user dari $request (Lebih rapi daripada auth())
        $user = $request->user();

        // 2. Logic:
        // - Jika User gak ada (belum login), ATAU
        // - Role user tidak ada di dalam daftar $roles
        if (! $user || ! in_array($user->role, $roles)) {
            abort(403); // Tendang
        }

        return $next($request);
    }
}