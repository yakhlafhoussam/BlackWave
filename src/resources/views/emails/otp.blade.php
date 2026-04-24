<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your OTP Code - BlackWave</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f4f4; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">
    
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #f4f4f4;">
        <tr>
            <td align="center" style="padding: 40px 20px;">
                <table width="100%" max-width="500" cellpadding="0" cellspacing="0" border="0" style="max-width: 500px; width: 100%; background: #ffffff; border-radius: 16px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                    
                    {{-- Header --}}
                    <tr>
                        <td align="center" style="padding: 40px 40px 20px 40px;">
                            <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #3b82f6, #8b5cf6); border-radius: 12px; margin: 0 auto 16px auto;">
                                <span style="display: block; text-align: center; line-height: 50px; font-size: 20px; font-weight: bold; color: white;">BW</span>
                            </div>
                            <h1 style="font-size: 24px; font-weight: 700; color: #1f2937; margin: 0 0 8px 0;">Verification Code</h1>
                            <p style="color: #6b7280; font-size: 14px; margin: 0;">Use this code to verify your email address</p>
                        </td>
                    </tr>
                    
                    {{-- OTP Code Box --}}
                    <tr>
                        <td align="center" style="padding: 20px 40px;">
                            <div style="background: #f3f4f6; border-radius: 12px; padding: 20px; text-align: center;">
                                <p style="color: #4b5563; font-size: 14px; margin: 0 0 12px 0;">Your verification code is:</p>
                                <div style="background: #ffffff; border: 2px solid #e5e7eb; border-radius: 12px; padding: 16px; font-size: 32px; font-weight: bold; letter-spacing: 8px; color: #3b82f6;">
                                    {{ $otp }}
                                </div>
                                <p style="color: #9ca3af; font-size: 12px; margin: 12px 0 0 0;">This code expires in 10 minutes</p>
                            </div>
                        </td>
                    </tr>
                    
                    {{-- Footer --}}
                    <tr>
                        <td align="center" style="padding: 20px 40px 40px 40px;">
                            <p style="color: #6b7280; font-size: 12px; margin: 0 0 8px 0;">
                                If you didn't request this code, please ignore this email.
                            </p>
                            <p style="color: #9ca3af; font-size: 11px; margin: 0;">
                                © {{ date('Y') }} BlackWave. All rights reserved.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>