<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CitiesMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $role = Auth::user()->role;

        if($role != "admin") {
            return redirect("/register");
        }

        return $next($request);
    }
}
