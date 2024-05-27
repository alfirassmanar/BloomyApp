<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class LoginBloomy
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna sudah login
        if (Auth::check()) {
            // Jika sudah login, lanjutkan ke rute yang diminta
            return $next($request);
        } else {
            // Jika belum login, redirect ke halaman login
            return redirect()->route('index.loginBloomy');
        }
    }
}
