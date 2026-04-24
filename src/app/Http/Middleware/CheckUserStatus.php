<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserStatus
{
    public function handle(Request $request, Closure $next)
    {
        $user = User::where('id', Auth::id())->first();

        if ($user->is_banned == false && $request->routeIs('banned.page')) {
            abort(404);
        }

        $isProfileIncomplete =
            empty($user->username) ||
            empty($user->gender) ||
            empty($user->email);

        if (!$isProfileIncomplete && $request->routeIs('complete-profile*')) {
            abort(404);
        }

        if ($user->email_verified_at && $request->routeIs('otp.*')) {
            abort(404);
        }

        return $next($request);
    }
}
