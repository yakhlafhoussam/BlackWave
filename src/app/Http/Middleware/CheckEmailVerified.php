<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckEmailVerified
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && User::where('id', Auth::id())->first()->email_verified_at === null) {
            return redirect()->route('otp.send');
        }

        return $next($request);
    }
}
