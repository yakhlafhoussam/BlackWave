{{-- resources/views/emails/invitation.blade.php --}}
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You're Invited to BlackWave</title>
</head>

<body
    style="margin: 0; padding: 0; background-color: #030712; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;">

    {{-- Main Container --}}
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #030712;">
        <tr>
            <td align="center" style="padding: 40px 20px;">
                <table width="100%" max-width="560" cellpadding="0" cellspacing="0" border="0"
                    style="max-width: 560px; width: 100%; background: linear-gradient(135deg, #0a0f1a 0%, #030712 100%); border: 1px solid rgba(59, 130, 246, 0.15); border-radius: 24px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);">

                    {{-- Header with Logo --}}
                    <tr>
                        <td align="center" style="padding: 40px 40px 20px 40px;">
                            <div style="margin-bottom: 20px;">
                                <img src="https://raw.githubusercontent.com/yakhlafhoussam/BlackWave/refs/heads/main/src/public/images/BlackWave.jpg"
                                    alt="BlackWave Logo"
                                    style="width: 60px; height: 60px; border-radius: 16px; box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);">
                            </div>
                            <h1
                                style="font-size: 32px; font-weight: 800; background: linear-gradient(135deg, #ffffff 0%, #93c5fd 50%, #c084fc 100%); -webkit-background-clip: text; background-clip: text; color: transparent; margin: 0 0 12px 0; letter-spacing: -0.5px;">
                                You're Invited!
                            </h1>
                            <p style="color: #9ca3af; font-size: 14px; margin: 0; line-height: 1.5;">
                                Join the premier social marketplace for creators
                            </p>
                    <tr>
                    </tr>

                    {{-- invitation Info --}}
                    <tr>
                        <td align="center" style="padding: 20px 40px;">
                            <div
                                style="background: rgba(59, 130, 246, 0.05); border-radius: 20px; padding: 24px; border: 1px solid rgba(59, 130, 246, 0.1);">
                                <div
                                    style="display: flex; align-items: center; justify-content: center; gap: 12px; margin-bottom: 16px;">
                                    <div
                                        style="width: 48px; height: 48px; background: linear-gradient(135deg, #0e193a, #000); border-radius: 50%; text-align: center; margin: 0px 5px 0px 0px">
                                        <span style="font-size:18px; font-weight:bold; color:white; line-height:48px;">
                                            {{ substr($invitation->sender->username ?? 'U', 0, 2) }}
                                        </span>
                                    </div>
                                    <div style="text-align: left;">
                                        <p style="font-weight: 600; color: #ffffff; margin: 0; font-size: 16px;">
                                            {{ $invitation->sender->username ?? 'A BlackWave Member' }}
                                        </p>
                                        <p style="color: #6b7280; margin: 0; font-size: 12px;">BlackWave Member</p>
                                    </div>
                                </div>
                                <p style="color: #9ca3af; font-size: 14px; margin: 0; line-height: 1.6;">
                                    <span
                                        style="color: #60a5fa;">{{ $invitation->sender->username ?? 'Someone' }}</span>
                                    believes you would be a valuable addition to the BlackWave community and has
                                    personally invited you to join.
                                </p>
                            </div>
                        </td>
                    </tr>

                    {{-- What Awaits You --}}
                    <tr>
                        <td align="center" style="padding: 20px 40px;">
                            <h2
                                style="font-size: 16px; font-weight: 600; color: #ffffff; text-align: center; margin: 0 0 16px 0;">
                                ✨ What Awaits You
                            </h2>
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td style="padding: 0 4px 12px 4px;">
                                        <div
                                            style="background: rgba(59,130,246,0.08); border-radius: 12px; padding: 12px; text-align: center;">
                                            <div style="font-size: 24px; margin-bottom: 6px;">📷</div>
                                            <p style="color: #e5e7eb; font-size: 12px; font-weight: 500; margin: 0;">
                                                Share Your Work</p>
                                            <p style="color: #6b7280; font-size: 10px; margin: 4px 0 0 0;">Showcase
                                                creativity</p>
                                        </div>
                                    </td>
                                    <td style="padding: 0 4px 12px 4px;">
                                        <div
                                            style="background: rgba(139,92,246,0.08); border-radius: 12px; padding: 12px; text-align: center;">
                                            <div style="font-size: 24px; margin-bottom: 6px;">🛠️</div>
                                            <p style="color: #e5e7eb; font-size: 12px; font-weight: 500; margin: 0;">
                                                Offer Services</p>
                                            <p style="color: #6b7280; font-size: 10px; margin: 4px 0 0 0;">Monetize your
                                                skills</p>
                                        </div>
                                    </td>
                                    <td style="padding: 0 4px 12px 4px;">
                                        <div
                                            style="background: rgba(16,185,129,0.08); border-radius: 12px; padding: 12px; text-align: center;">
                                            <div style="font-size: 24px; margin-bottom: 6px;">💰</div>
                                            <p style="color: #e5e7eb; font-size: 12px; font-weight: 500; margin: 0;">
                                                Earn Points</p>
                                            <p style="color: #6b7280; font-size: 10px; margin: 4px 0 0 0;">Get rewarded
                                            </p>
                                        </div>
                                    </td>
                                    <td style="padding: 0 4px 12px 4px;">
                                        <div
                                            style="background: rgba(245,158,11,0.08); border-radius: 12px; padding: 12px; text-align: center;">
                                            <div style="font-size: 24px; margin-bottom: 6px;">👥</div>
                                            <p style="color: #e5e7eb; font-size: 12px; font-weight: 500; margin: 0;">
                                                Build Community</p>
                                            <p style="color: #6b7280; font-size: 10px; margin: 4px 0 0 0;">Connect with
                                                creators</p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- CTA Button --}}
                    <tr>
                        <td align="center" style="padding: 20px 40px 32px 40px;">
                            <table cellpadding="0" cellspacing="0" border="0" style="margin: 0 auto;">
                                <tr>
                                    <td align="center"
                                        style="background: linear-gradient(135deg, #3b82f6, #8b5cf6); border-radius: 40px; padding: 0;">
                                        <a href="{{ $inviteUrl }}"
                                            style="display: inline-block; color: #ffffff; text-decoration: none; padding: 14px 36px; font-weight: 600; font-size: 15px;">
                                            Join BlackWave Now
                                        </a>
                                    </td>
                                </tr>
                            </table>
                            <p style="color: #6b7280; font-size: 11px; margin-top: 14px;">
                                Your unique invitation link • One click to get started
                            </p>
                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td align="center" style="padding: 0 40px 32px 40px;">
                            <div
                                style="height: 1px; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.05), transparent); margin-bottom: 20px;">
                            </div>
                            <p style="color: #374151; font-size: 10px; margin: 0;">
                                If you didn't expect this invitation, you can safely ignore this email.
                            </p>
                            <div style="margin-top: 16px;">
                                <p style="color: #374151; font-size: 10px; margin: 0;">
                                    © {{ date('Y') }} BlackWave. All rights reserved.
                                </p>
                                <p style="color: #1f2937; font-size: 9px; margin: 6px 0 0 0;">
                                    From the deep, we rise.
                                </p>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
