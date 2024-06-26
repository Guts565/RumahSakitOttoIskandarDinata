<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->acc_type == 'admin') {
            return $next($request);
        }
        abort(404, 'The requested URL was not found on this server.'); // ganti ini dengan rute yang sesuai untuk pengguna biasa
    }
}
