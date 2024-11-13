<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MemberMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        // Pemeriksaan peran "Member"
        if ($user && $user->isMember()) {
            return $next($request);
        }

        abort(403, 'MEMBER');
    }
}
