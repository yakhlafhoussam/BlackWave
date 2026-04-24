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
            return redirect()->route('home');
        }

        $isProfileIncomplete =
            empty($user->username) ||
            empty($user->gender) ||
            empty($user->email);

        if (!$isProfileIncomplete && $request->routeIs('complete-profile*')) {
            return redirect()->route('home');
        }

        if ($user->email_verified_at ==! null && $request->routeIs('otp.*')) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
