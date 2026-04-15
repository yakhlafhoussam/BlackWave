<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    public function apply(Request $request)
    {
        $user = User::where('id', Auth::id())->first();

        if ($user->has_applied_password) {
            return redirect()
                ->route('check.password')
                ->with('warning', 'Service already applied because you already bought this service and you did not use it.');
        }

        if ($user->points < 500) {
            return back()
                ->with('error', "You don't have enough points");
        }

        $user->update([
            'points' => $user->points - 500,
            'has_applied_password' => true
        ]);

        return redirect()
            ->route('check.password')
            ->with('info', 'You bought this product with 500 points.');
    }

    public function redirect()
    {
        $user = User::where('id', Auth::id())->first();

        if (!$user->has_applied_password) {
            return redirect()
                ->route('home')
                ->with('error', 'You can\'t access to this page whit url try join via Service page');
        }

        return view('apply.password');
    }

    public function start(Request $request)
    {
        $user = User::where('id', Auth::id())->first();

        if (!$user->has_applied_password) {
            return redirect()
                ->route('home')
                ->with('error', 'You can\'t access to this page whit url try join via Service page');
        }

        $user->update([
            'has_applied_password' => false
        ]);
        $hash = $request->hash_password;
        return view('start.password', compact('hash'));
    }

    public function now(Request $request)
    {
        header('Content-Type: application/json');

        $data = json_decode(file_get_contents("php://input"), true);

        $hashedPassword = $data['hash'] ?? '';
        $password = $data['password'] ?? '';

        if (password_verify($password, $hashedPassword)) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
