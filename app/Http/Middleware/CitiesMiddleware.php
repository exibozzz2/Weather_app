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


        return Auth::user()->role !== 'admin' ?

            redirect('/error') : $next($request);
    }
}
