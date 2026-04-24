<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your OTP Code - BlackWave</title>
</head>

<body
    style="margin: 0; padding: 0; background-color: #030712; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #030712;">
        <tr>
            <td align="center" style="padding: 40px 20px;">
                <table width="100%" max-width="500" cellpadding="0" cellspacing="0" border="0"
                    style="max-width: 500px; width: 100%; background: linear-gradient(135deg, #0a0f1a 0%, #030712 100%); border: 1px solid rgba(59, 130, 246, 0.15); border-radius: 24px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);">

                    {{-- Header with Logo --}}
                    <tr>
                        <td align="center" style="padding: 40px 40px 20px 40px;">
                            <div style="margin-bottom: 16px;">
                                <img src="https://raw.githubusercontent.com/yakhlafhoussam/BlackWave/refs/heads/main/src/public/images/BlackWave.jpg"
                                    alt="BlackWave Logo"
                                    style="width: 55px; height: 55px; border-radius: 14px; box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);">
                            </div>
                            <h1
                                style="font-size: 26px; font-weight: 800; background: linear-gradient(135deg, #ffffff 0%, #93c5fd 50%, #c084fc 100%); -webkit-background-clip: text; background-clip: text; color: transparent; margin: 0 0 8px 0; letter-spacing: -0.5px;">
                                Verification Code
                            </h1>
                            <p style="color: #9ca3af; font-size: 14px; margin: 0; line-height: 1.5;">
                                Use this code to verify your email address
                            </p>
                        </td>
                    </tr>

                    {{-- Divider --}}
                    <tr>
                        <td align="center" style="padding: 0 40px;">
                            <div
                                style="height: 1px; background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.3), rgba(139, 92, 246, 0.3), transparent);">
                            </div>
                </table>
        </tr>

        {{-- OTP Code Box --}}
        <tr>
            <td align="center" style="padding: 32px 40px;">
                <div
                    style="background: rgba(59, 130, 246, 0.05); border-radius: 20px; padding: 24px; text-align: center; border: 1px solid rgba(59, 130, 246, 0.1);">
                    <p style="color: #9ca3af; font-size: 13px; margin: 0 0 16px 0; letter-spacing: 0.5px;">
                        Your verification code is:
                    </p>
                    <div
                        style="background: linear-gradient(135deg, #1a2332 0%, #0f1420 100%); border: 2px solid rgba(59, 130, 246, 0.3); border-radius: 16px; padding: 18px 16px;">
                        <span
                            style="font-size: 34px; font-weight: 800; letter-spacing: 10px; color: #60a5fa; font-family: 'Courier New', monospace;">
                            {{ $otp }}
                        </span>
                    </div>
                    <p style="color: #6b7280; font-size: 12px; margin: 16px 0 0 0;">
                        This code expires in <strong style="color: #fbbf24;">10 minutes</strong>
                    </p>
                </div>
            </td>
        </tr>

        {{-- Security Notice --}}
        <tr>
            <td align="center" style="padding: 0 40px 20px 40px;">
                <div
                    style="background: rgba(239, 68, 68, 0.05); border-radius: 12px; padding: 12px; border: 1px solid rgba(239, 68, 68, 0.1);">
                    <div style="display: flex; align-items: center; justify-content: center; gap: 6px;">
                        <span style="font-size: 13px;">⚠️</span>
                        <span style="color: #f87171; font-size: 11px;">Never share this code with anyone</span>
                    </div>
                </div>
            </td>
        </tr>

        {{-- Divider --}}
        <tr>
            <td align="center" style="padding: 0 40px;">
                <div
                    style="height: 1px; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.05), transparent);">
                </div>
            </td>
        </tr>

        {{-- Footer --}}
        <tr>
            <td align="center" style="padding: 24px 40px 32px 40px;">
                <p style="color: #4b5563; font-size: 11px; margin: 0 0 8px 0; line-height: 1.5;">
                    If you didn't request this code, please ignore this email.
                </p>
                <div style="margin-top: 16px; padding-top: 12px; border-top: 1px solid rgba(255,255,255,0.05);">
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
