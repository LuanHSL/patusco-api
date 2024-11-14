<?php

namespace App\Http\Middleware;

use App\Utils\Cors as UtilsCors;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $headers = UtilsCors::getCORSHeaders();

        foreach ($headers as $key => $value) {
            $response->header($key, $value);
        }

        return $response;
    }
}
