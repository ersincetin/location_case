<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class RateLimitMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();
        $key = "rate_limit:$ip";
        $maxRequests = 25;
        $decayMinutes = 1;

        if (Cache::has($key) && Cache::get($key) >= $maxRequests) {
            return response()->json(['error' => 'Too many requests'], 429);
        }

        Cache::increment($key);
        Cache::put($key, Cache::get($key, 0), now()->addMinutes($decayMinutes));

        return $next($request);
    }
}
