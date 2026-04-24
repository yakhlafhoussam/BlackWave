<?php

namespace App\Http\Controllers;

use App\Mail\InvitationMail;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InvitationController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::id())->first();

        $invitationsSent = Invitation::where('sender_id', $user->id)->count();
        $friendsJoined = Invitation::where('sender_id', $user->id)->where('status', true)->count();
        $pointsEarned = $friendsJoined * 250;
        $recentInvitations = Invitation::where('sender_id', $user->id)->latest()->take(10)->get();

        return view('emails.invite', compact('invitationsSent', 'friendsJoined', 'pointsEarned', 'recentInvitations'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        if ($request->email === User::where('id', Auth::id())->first()->email) {
            return back()->with('error', 'You cannot invite yourself.');
        }

        if (User::where('email', $request->email)->first()) {
            return back()->with('error', 'This email already in the platform.');
        }

        $existingInvitation = Invitation::where('email', $request->email)
            ->where('status', false)
            ->first();

        if ($existingInvitation) {
            return back()->with('error', 'An invitation has already been sent to this email.');
        }

        $invitation = Invitation::create([
            'sender_id' => Auth::id(),
            'email' => $request->email,
            'token' => Str::uuid(),
            'status' => false,
        ]);

        $inviteUrl = route('invitations.accept', $invitation->token);

        Mail::to($invitation->email)->send(new InvitationMail($invitation, $inviteUrl));

        return back()->with('success', 'Invitation sent successfully.');
    }

    public function accept(string $token)
    {
        $invitation = Invitation::where('token', $token)->first();

        if (! $invitation) {
            return redirect()->route('login')->with('error', 'Invalid invitation link.');
        }

        if ($invitation->status) {
            return redirect()->route('login')->with('error', 'This invitation has already been accepted.');
        }

        if (Auth::check()) {
            if (User::where('id', Auth::id())->first()->email !== $invitation->email) {
                return redirect()->route('home')->with('error', 'This invitation does not belong to your account.');
            } else {
                $invitation->update([
                    'status' => true,
                ]);
                return redirect()->route('/')->with('info', 'This lien is expired because you are already loged.');
            }
        }

        $invitation->update([
            'status' => true,
        ]);

        $baseUsername = explode('@', $invitation->email)[0];
        $username = $baseUsername;
        $i = 1;

        while (User::where('username', $username)->exists()) {
            $username = $baseUsername . $i;
            $i++;
        }

        $user = User::create([
            'username' => $username,
            'profile_image' => null,
            'gender' => null,
            'points' => 500,
            'email' => $invitation->email,
            'is_admin' => false,
            'is_banned' => false,
            'password' => bcrypt($invitation->token),
            'google_id' => null,
            'bio' => null,
        ]);

        Auth::login($user);

        $invitation->sender->increment('points', 250);

        return redirect()->route('home')->with('success', 'Invitation accepted successfully.');
    }
}
