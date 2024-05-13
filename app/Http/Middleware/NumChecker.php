<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use function Laravel\Prompts\error;

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

        if (!is_numeric($income) || $income <= 0) {
            session()->flash("errors", ["Income must be positive and numerical"]);
            return redirect()->back();
        }

        return $next($request);
    }
}
