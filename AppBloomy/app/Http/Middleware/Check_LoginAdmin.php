<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use App\Models\User;

class Check_LoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login.admin.bloomy');
        }

        $allowedRoles = [1, 2];

        if (!in_array(Auth::user()->id_role, $allowedRoles)) {
            return redirect()->route('login.admin.bloomy');
        }
        return $next($request);
    }
}
