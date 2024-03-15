<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor;

class VisitorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $visitorIp = $request->ip();
        $date = now()->startOfDay();

        $visitor = Visitor::where('ip', $visitorIp)
            ->whereDate('created_at', $date)
            ->first();

        if (!$visitor) {
            Visitor::create(['ip' => $visitorIp]);
        }

        return $next($request);
    }
}
