<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperuserMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        // Pemeriksaan peran "Superuser"
        if ($user && $user->isSuperuser()) {
            return $next($request);
        }

        abort(403, 'Unauthorized ( SuperUser Access ) ');
    }
}
