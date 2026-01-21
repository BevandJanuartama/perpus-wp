<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$levels): Response
    {
        // Cek apakah user sudah login dan apakah levelnya ada dalam daftar yang diizinkan
        if (Auth::check() && in_array(Auth::user()->level, $levels)) {
            return $next($request);
        }

        abort(403, 'AKSES DITOLAK: Anda tidak memiliki otoritas untuk mengakses Gotham Archives.');
    }
}
