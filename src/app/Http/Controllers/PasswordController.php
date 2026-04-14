<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function apply(Request $request)
    {
        return view('apply.password');
    }

    public function start(Request $request)
    {
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
