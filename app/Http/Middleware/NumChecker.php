<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NumChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        $income = $request->income;

        is_numeric($income) ? $request->attributes->add(["isTrue" => true]) : $request->attributes->add(["isTrue" => false]);

        return $next($request);
    }
}
