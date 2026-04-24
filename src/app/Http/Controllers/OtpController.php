<?php

namespace App\Http\Controllers;

use App\Mail\OtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OtpController extends Controller
{
    public function sendOtp()
    {
        $user = User::where('id', Auth::id())->first();

        if ($user->email_verified_at) {
            return redirect()->route('home')->with('info', 'Already verified.');
        }

        if (session()->has('otp_code')) {
            return redirect()->route('otp.confirm')
                ->with('info', 'OTP already sent. Please check your email.');
        }

        $otp = (string) random_int(100000, 999999);

        session([
            'otp_code' => $otp,
            'otp_attempts' => 0,
        ]);

        Mail::to($user->email)->send(new OtpMail($otp));
        return redirect()->route('otp.confirm')->with('success', 'OTP sent.');
    }

    public function showConfirmForm()
    {
        return view('auth.confirm-otp');
    }

    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => ['required'],
        ]);
        if ($validator->fails()) {
            return back()
                ->with('warning', 'OTP must be 6 digits.');
        }

        $user = User::where('id', Auth::id())->first();

        if ($user->email_verified_at) {
            return redirect()->route('home')->with('info', 'Already verified.');
        }

        if (! session()->has('otp_code')) {
            return redirect()->route('otp.send')
                ->with('warning', 'No OTP found. A new code has been sent.');
        }

        session()->increment('otp_attempts');
        if ($request->otp != session('otp_code')) {
            if (session('otp_attempts') >= 5) {
                session()->forget(['otp_code', 'otp_attempts']);

                return redirect()->route('otp.send')
                    ->with('warning', 'Too many attempts. A new OTP has been sent.');
            }

            return back()->with('error', 'Invalid OTP.');
        }

        session()->forget(['otp_code', 'otp_attempts']);

        $user->email_verified_at = now();
        $user->save();

        return redirect()->route('home')->with('success', 'Account confirmed successfully.');
    }
}
