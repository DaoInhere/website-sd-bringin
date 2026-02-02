<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="font-family: 'Segoe UI', Arial, sans-serif; background-color: #f4f7fa; margin: 0; padding: 0;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #f4f7fa; padding: 40px 10px;">
        <tr>
            <td align="center">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width: 600px; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                    <tr>
                        <td align="center" style="background-color: #0d9488; padding: 30px;">
                            <h2 style="color: #ffffff; margin: 0; font-size: 20px; letter-spacing: 1px;">SDN BRINGIN 01</h2>
                            <p style="color: #ccfbf1; margin: 5px 0 0; font-size: 14px;">Kota Semarang</p>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="padding: 40px 30px; text-align: center;">
                            <h1 style="color: #1e293b; font-size: 22px; margin: 0 0 20px;">Halo, {{ $name }}!</h1>
                            
                            <p style="color: #475569; font-size: 16px; line-height: 1.6; margin-bottom: 30px;">
                                Kami menerima permintaan untuk mengatur ulang kata sandi akun Anda. Silakan klik tombol di bawah ini untuk melanjutkan.
                            </p>

                            <div style="margin: 30px 0;">
                                <a href="{{ $url }}" style="background-color: #0d9488; color: #ffffff; padding: 14px 35px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 16px; display: inline-block;">
                                    Reset Kata Sandi
                                </a>
                            </div>

                            <div style="margin-top: 35px; padding: 20px; background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px;">
                                <p style="color: #64748b; font-size: 13px; margin: 0; line-height: 1.5;">
                                    <strong>Catatan:</strong> Link ini akan kedaluwarsa dalam 60 menit. Jika Anda tidak meminta reset kata sandi, abaikan email ini.
                                </p>
                            </div>

                            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px dashed #e2e8f0; text-align: left;">
                                <p style="color: #94a3b8; font-size: 12px; margin: 0 0 10px; line-height: 1.4;">
                                    Jika Anda mengalami masalah saat mengklik tombol "Reset Kata Sandi", salin dan tempel URL di bawah ini ke browser web Anda:
                                </p>
                                <p style="word-break: break-all; margin: 0; font-size: 12px;">
                                    <a href="{{ $url }}" style="color: #0d9488; text-decoration: none;">
                                        {{ $url }}
                                    </a>
                                </p>
                            </div>

                            <p style="color: #94a3b8; margin-top: 35px; font-size: 14px; line-height: 1.5;">
                                Hormat kami,<br>
                                <strong style="color: #475569;">Admin SDN Bringin 01 Kota Semarang</strong>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>