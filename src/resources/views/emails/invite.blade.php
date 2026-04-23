{{-- resources/views/invite.blade.php --}}
@extends('layouts.app')

@section('title', 'Invite Friends - BlackWave')

@section('content')
    <div class="max-w-4xl mx-auto px-4 md:px-6 lg:px-8 py-6 md:py-8">

        {{-- Header --}}
        <div class="mb-8">
            <div class="flex items-center gap-3 mb-2">
                <div
                    class="h-12 w-12 rounded-xl bg-gradient-to-r from-blue-600 to-purple-600 flex items-center justify-center shadow-lg">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12l-4 4-4-4" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-white">Invite Friends</h1>
                    <p class="text-gray-500 text-sm">Invite your friends to join BlackWave and earn rewards</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Main Form --}}
            <div class="lg:col-span-2">
                <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-6 md:p-8">
                    <form method="POST" action="{{ route('invitations.send') }}" class="space-y-6">
                        @csrf

                        {{-- Points Info Banner --}}
                        <div
                            class="rounded-xl bg-gradient-to-r from-yellow-600/20 to-orange-600/20 border border-yellow-500/30 p-4">
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 rounded-full bg-yellow-500/20 flex items-center justify-center">
                                    <svg class="h-5 w-5 text-yellow-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-white text-sm font-medium">Earn <span
                                            class="text-yellow-400 font-bold">250 points</span> for each friend who joins!
                                    </p>
                                    <p class="text-gray-500 text-xs">You'll receive points when your invited friend
                                        successfully registers</p>
                                </div>
                            </div>
                        </div>

                        {{-- Email Input --}}
                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-medium text-gray-300">
                                Friend's Email Address
                                <span class="text-red-400 ml-0.5">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                    placeholder="friend@example.com"
                                    class="w-full rounded-xl border bg-white/5 pl-10 pr-4 py-3 text-white placeholder-gray-500 transition-all duration-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 @error('email') border-red-500 @else border-white/10 @enderror">
                            </div>
                            @error('email')
                                <p class="text-sm text-red-400">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-gray-500">Enter your friend's email address to send an invitation</p>
                        </div>

                        {{-- Submit Button --}}
                        <button type="submit"
                            class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl transition-all duration-200 hover:opacity-90 hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                            Send Invitation
                        </button>
                    </form>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="lg:col-span-1">
                {{-- Stats Card --}}
                <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-6 mb-6">
                    <div class="text-center mb-4">
                        <div class="h-14 w-14 rounded-full bg-green-500/20 flex items-center justify-center mx-auto mb-3">
                            <svg class="h-7 w-7 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-white">Your Stats</h3>
                    </div>

                    <div class="space-y-3">
                        <div class="flex justify-between items-center p-3 rounded-xl bg-white/5">
                            <span class="text-gray-400 text-sm">Invitations Sent</span>
                            <span class="text-white font-bold text-lg">{{ $invitationsSent ?? 0 }}</span>
                        </div>
                        <div class="flex justify-between items-center p-3 rounded-xl bg-white/5">
                            <span class="text-gray-400 text-sm">Friends Joined</span>
                            <span class="text-green-400 font-bold text-lg">{{ $friendsJoined ?? 0 }}</span>
                        </div>
                        <div
                            class="flex justify-between items-center p-3 rounded-xl bg-gradient-to-r from-blue-600/20 to-purple-600/20">
                            <span class="text-gray-400 text-sm">Points Earned</span>
                            <span class="text-yellow-400 font-bold text-lg">{{ $pointsEarned ?? 0 }}</span>
                        </div>
                    </div>
                </div>

                {{-- How it Works --}}
                <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-6 mb-6">
                    <div class="text-center mb-4">
                        <div class="h-14 w-14 rounded-full bg-blue-500/20 flex items-center justify-center mx-auto mb-3">
                            <svg class="h-7 w-7 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-white">How it works</h3>
                    </div>

                    <div class="space-y-4 text-sm">
                        <div class="flex gap-3">
                            <div
                                class="flex-shrink-0 h-6 w-6 rounded-full bg-blue-500/20 text-blue-400 flex items-center justify-center text-xs font-bold">
                                1</div>
                            <div>
                                <p class="text-white font-medium">Enter Friend's Email</p>
                                <p class="text-gray-500 text-xs">Add your friend's email address</p>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <div
                                class="flex-shrink-0 h-6 w-6 rounded-full bg-blue-500/20 text-blue-400 flex items-center justify-center text-xs font-bold">
                                2</div>
                            <div>
                                <p class="text-white font-medium">Send Invitation</p>
                                <p class="text-gray-500 text-xs">Your friend receives an email invitation</p>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <div
                                class="flex-shrink-0 h-6 w-6 rounded-full bg-blue-500/20 text-blue-400 flex items-center justify-center text-xs font-bold">
                                3</div>
                            <div>
                                <p class="text-white font-medium">Friend Registers</p>
                                <p class="text-gray-500 text-xs">They click the link and create an account</p>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <div
                                class="flex-shrink-0 h-6 w-6 rounded-full bg-green-500/20 text-green-400 flex items-center justify-center text-xs font-bold">
                                4</div>
                            <div>
                                <p class="text-white font-medium">Earn Points</p>
                                <p class="text-gray-500 text-xs">Get <span class="text-yellow-400">250 points</span> when
                                    they join!</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Share Link --}}
                <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-5">
                    <h3 class="text-sm font-semibold text-white mb-3">Or Share Your Invite Link</h3>
                    <div class="flex gap-2">
                        <input type="text" id="inviteLink"
                            value="{{ route('register', ['ref' => auth()->user()->id]) }}" readonly
                            class="flex-1 px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:border-blue-500 focus:outline-none">
                        <button onclick="copyInviteLink()"
                            class="px-3 py-2 bg-blue-600 text-white rounded-lg text-sm font-medium hover:bg-blue-500 transition-colors">
                            Copy
                        </button>
                    </div>
                    <p class="text-xs text-gray-500 mt-2">Share this link anywhere - your friends can join directly!</p>
                </div>

                {{-- Recent Invitations --}}
                @if (isset($recentInvitations) && $recentInvitations->count() > 0)
                    <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-5 mt-6">
                        <h3 class="text-sm font-semibold text-white mb-3">Recent Invitations</h3>
                        <div class="space-y-3">
                            @foreach ($recentInvitations as $invite)
                                <div class="flex items-center gap-2 text-sm">
                                    <div
                                        class="h-2 w-2 rounded-full {{ $invite->status ? 'bg-green-500' : 'bg-yellow-500' }}">
                                    </div>
                                    <span class="text-gray-400 text-xs flex-1 truncate">{{ $invite->email }}</span>
                                    <span class="text-xs {{ $invite->status ? 'text-green-400' : 'text-yellow-400' }}">
                                        {{ $invite->status ? 'Accepted' : 'Pending' }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        function copyInviteLink() {
            const linkInput = document.getElementById('inviteLink');
            linkInput.select();
            linkInput.setSelectionRange(0, 99999);
            document.execCommand('copy');

            // Show temporary feedback
            const btn = event.target;
            const originalText = btn.innerHTML;
            btn.innerHTML = 'Copied!';
            setTimeout(() => {
                btn.innerHTML = originalText;
            }, 2000);
        }
    </script>
@endsection
