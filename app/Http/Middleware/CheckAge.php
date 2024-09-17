<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $ageParameter): Response
    {
        // $age = $request->route('age');
        // if ($age < 15) {
        //     return redirect('/');
        // }

        if ($ageParameter < 15) {
            return redirect('/');
        }

        return $next($request);
    }
}
