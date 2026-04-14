<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckProfile
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        $isProfileIncomplete =
            empty($user->username) ||
            empty($user->gender) ||
            empty($user->email);

        if ($isProfileIncomplete) {
            return redirect()->route('complete-profile')
                ->with('info', 'Please complete your profile first.');
        }

        return $next($request);
    }
}