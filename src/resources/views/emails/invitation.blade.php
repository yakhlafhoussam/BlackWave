{{-- resources/views/emails/invitation.blade.php --}}
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitation to BlackWave</title>
</head>

<body
    style="margin: 0; padding: 0; background-color: #030712; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">

    {{-- Main Container --}}
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #030712;">
        <tr>
            <td align="center" style="padding: 40px 20px;">
                <table width="100%" max-width="600" cellpadding="0" cellspacing="0" border="0"
                    style="max-width: 600px; width: 100%; background: linear-gradient(135deg, #111827 0%, #030712 100%); border: 1px solid rgba(59, 130, 246, 0.15); border-radius: 32px;">

                    {{-- Logo Section --}}
                    <tr>
                        <td align="center" style="padding: 48px 40px 0 40px;">
                            <table cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td align="center">
                                        {{-- Logo with Glow Effect --}}
                                        <div style="text-align: center; margin-bottom: 32px;">
                                            <div style="display: inline-block; position: relative;">
                                                <div
                                                    style="position: absolute; inset: -10px; background: radial-gradient(circle, rgba(59,130,246,0.3) 0%, transparent 70%); border-radius: 50%;">
                                                </div>
                                                <img src="https://raw.githubusercontent.com/yakhlafhoussam/BlackWave/refs/heads/main/src/public/images/BlackWave.jpg" alt="BlackWave"
                                                    style="width: 70px; height: 70px; border-radius: 18px; box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3); position: relative; z-index: 1;">
                                            </div>
                                        </div>
                                        {{-- Fallback message for blocked images --}}
                                        <div
                                            style="background-color: #1f2937; border-radius: 8px; padding: 8px 16px; margin-top: 8px;">
                                            <span style="color: #9ca3af; font-size: 12px;">⚡ BlackWave</span>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- Title --}}
                    <tr>
                        <td align="center" style="padding: 20px 40px 0 40px;">
                            <h1
                                style="font-size: 32px; font-weight: 800; color: #ffffff; margin: 0 0 12px 0; letter-spacing: -0.5px;">
                                Exclusive Invitation
                            </h1>
                            <p style="color: #9ca3af; font-size: 16px; margin: 0 0 24px 0; line-height: 1.5;">
                                You've been invited to join the premier social marketplace
                            </p>
                        </td>
                    </tr>

                    {{-- Divider --}}
                    <tr>
                        <td align="center" style="padding: 0 40px;">
                            <div
                                style="height: 1px; background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.3), rgba(139, 92, 246, 0.3), transparent);">
                            </div>
                        </td>
                    </tr>

                    {{-- Inviter Info --}}
                    <tr>
                        <td align="center" style="padding: 32px 40px;">
                            <table cellpadding="0" cellspacing="0" border="0"
                                style="background: rgba(59, 130, 246, 0.05); border-radius: 20px; border: 1px solid rgba(59, 130, 246, 0.1); width: 100%;">
                                <tr>
                                    <td align="center" style="padding: 24px;">
                                        <div
                                            style="width: 48px; height: 48px; background: linear-gradient(135deg, #000, #000); border-radius: 50%; margin: 0 auto 12px auto;">
                                            <span
                                                style="display: block; text-align: center; line-height: 48px; font-size: 18px; font-weight: bold; color: white;">
                                                {{ substr($invitation->sender->username ?? 'U', 0, 1) }}
                                            </span>
                                        </div>
                                        <p
                                            style="font-weight: 600; color: #ffffff; margin: 0 0 4px 0; font-size: 16px;">
                                            {{ $invitation->sender->username ?? 'A BlackWave Member' }}
                                        </p>
                                        <p style="color: #6b7280; margin: 0; font-size: 12px;">
                                            BlackWave Member
                                        </p>
                                        <p
                                            style="color: #9ca3af; font-size: 14px; margin: 16px 0 0 0; line-height: 1.6;">
                                            <span
                                                style="color: #60a5fa;">{{ $invitation->sender->username ?? 'Someone' }}</span>
                                            believes you would be a valuable addition to the BlackWave community and has
                                            personally invited you to join.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- What Awaits You Section --}}
                    <tr>
                        <td align="center" style="padding: 0 40px;">
                            <h2
                                style="font-size: 18px; font-weight: 600; color: #ffffff; text-align: center; margin: 0 0 20px 0;">
                                ✨ What Awaits You
                            </h2>
                        </td>
                    </tr>

                    {{-- Features Grid --}}
                    <tr>
                        <td align="center" style="padding: 0 40px;">
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    {{-- Feature 1: Share Your Work --}}
                                    <td align="center" style="padding: 0 8px 16px 8px;">
                                        <table cellpadding="0" cellspacing="0" border="0"
                                            style="background: rgba(255,255,255,0.03); border-radius: 16px; width: 100%;">
                                            <tr>
                                                <td align="center" style="padding: 12px;">
                                                    <div
                                                        style="width: 32px; height: 32px; background: rgba(59,130,246,0.15); border-radius: 10px; margin: 0 auto 8px auto;">
                                                        <span
                                                            style="display: block; text-align: center; line-height: 32px; font-size: 16px;">📷</span>
                                                    </div>
                                                    <p
                                                        style="color: #e5e7eb; font-size: 13px; font-weight: 500; margin: 0 0 4px 0;">
                                                        Share Your Work</p>
                                                    <p style="color: #6b7280; font-size: 11px; margin: 0;">Showcase
                                                        creativity</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    {{-- Feature 2: Offer Services --}}
                                    <td align="center" style="padding: 0 8px 16px 8px;">
                                        <table cellpadding="0" cellspacing="0" border="0"
                                            style="background: rgba(255,255,255,0.03); border-radius: 16px; width: 100%;">
                                            <tr>
                                                <td align="center" style="padding: 12px;">
                                                    <div
                                                        style="width: 32px; height: 32px; background: rgba(139,92,246,0.15); border-radius: 10px; margin: 0 auto 8px auto;">
                                                        <span
                                                            style="display: block; text-align: center; line-height: 32px; font-size: 16px;">🛠️</span>
                                                    </div>
                                                    <p
                                                        style="color: #e5e7eb; font-size: 13px; font-weight: 500; margin: 0 0 4px 0;">
                                                        Offer Services</p>
                                                    <p style="color: #6b7280; font-size: 11px; margin: 0;">Monetize your
                                                        skills</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    {{-- Feature 3: Earn Points --}}
                                    <td align="center" style="padding: 0 8px 16px 8px;">
                                        <table cellpadding="0" cellspacing="0" border="0"
                                            style="background: rgba(255,255,255,0.03); border-radius: 16px; width: 100%;">
                                            <tr>
                                                <td align="center" style="padding: 12px;">
                                                    <div
                                                        style="width: 32px; height: 32px; background: rgba(16,185,129,0.15); border-radius: 10px; margin: 0 auto 8px auto;">
                                                        <span
                                                            style="display: block; text-align: center; line-height: 32px; font-size: 16px;">💰</span>
                                                    </div>
                                                    <p
                                                        style="color: #e5e7eb; font-size: 13px; font-weight: 500; margin: 0 0 4px 0;">
                                                        Earn Points</p>
                                                    <p style="color: #6b7280; font-size: 11px; margin: 0;">Get rewarded
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    {{-- Feature 4: Build Community --}}
                                    <td align="center" style="padding: 0 8px 16px 8px;">
                                        <table cellpadding="0" cellspacing="0" border="0"
                                            style="background: rgba(255,255,255,0.03); border-radius: 16px; width: 100%;">
                                            <tr>
                                                <td align="center" style="padding: 12px;">
                                                    <div
                                                        style="width: 32px; height: 32px; background: rgba(245,158,11,0.15); border-radius: 10px; margin: 0 auto 8px auto;">
                                                        <span
                                                            style="display: block; text-align: center; line-height: 32px; font-size: 16px;">👥</span>
                                                    </div>
                                                    <p
                                                        style="color: #e5e7eb; font-size: 13px; font-weight: 500; margin: 0 0 4px 0;">
                                                        Build Community</p>
                                                    <p style="color: #6b7280; font-size: 11px; margin: 0;">Connect with
                                                        creators</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- CTA Button --}}
                    <tr>
                        <td align="center" style="padding: 24px 40px 32px 40px;">
                            <table cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td align="center"
                                        style="background: linear-gradient(135deg, #3b82f6, #8b5cf6); border-radius: 40px;">
                                        <a href="{{ $inviteUrl }}"
                                            style="display: inline-block; color: #ffffff; text-decoration: none; padding: 14px 32px; font-weight: 600; font-size: 16px;">
                                            Join BlackWave Now
                                        </a>
                                    </td>
                                </tr>
                            </table>
                            <p style="color: #6b7280; font-size: 11px; margin-top: 12px;">
                                Your unique invitation link • One click to get started
                            </p>
                        </td>
                    </tr>

                    {{-- Divider --}}
                    <tr>
                        <td align="center" style="padding: 0 40px;">
                            <div
                                style="height: 1px; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);">
                            </div>
                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td align="center" style="padding: 24px 40px 32px 40px;">
                            <p style="color: #4b5563; font-size: 12px; margin: 0 0 8px 0; line-height: 1.5;">
                                This invitation was sent to you by a BlackWave member.
                            </p>
                            <p style="color: #374151; font-size: 11px; margin: 0;">
                                This invitation expires in 7 days. If you didn't expect this invitation, you can safely
                                ignore this email.
                            </p>
                            <div
                                style="margin-top: 16px; padding-top: 12px; border-top: 1px solid rgba(255,255,255,0.05);">
                                <p style="color: #374151; font-size: 10px; margin: 0;">
                                    © {{ date('Y') }} BlackWave. All rights reserved.
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
