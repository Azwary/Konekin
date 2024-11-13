<?php

namespace App\Http\Middleware;

use Closure;

class AdminGroupMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        // Pemeriksaan peran "Admin_group"
        if ($user && $user->isAdminGrup()) {
            return $next($request);
        }

        abort(403, 'MAAF ANDA TIDAK MEMILIKI IZIN');
    }
}
