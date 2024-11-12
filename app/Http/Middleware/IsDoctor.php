<?php

namespace App\Http\Middleware;

use App\Constants\RoleTypeConst;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsDoctor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role === RoleTypeConst::DOCTOR) {
            return $next($request);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
