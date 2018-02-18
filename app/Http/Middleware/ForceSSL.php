<?php

namespace App\Http\Middleware;

use Closure;

class ForceSSL
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (env('REDIRECT_HTTPS', true) && $request->header('x-forwarded-proto') == 'http' && env('APP_ENV') != 'local') {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
