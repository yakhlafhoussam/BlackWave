<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || !(Auth::user()->is_admin ?? false)) {
            abort(403, 'Unauthorized');
        }
        return $next($request);
    }
}
