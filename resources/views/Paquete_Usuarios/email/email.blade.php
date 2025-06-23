<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px; margin: 0;">
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">
        <tr style="background-color: #0d6efd;">
            <td style="padding: 20px; text-align: center; color: white;">
                <h1 style="margin: 0; font-size: 24px;">{{ config('app.name') }}</h1>
            </td>
        </tr>

        <tr>
            <td style="padding: 30px;">
                <h2 style="font-size: 20px; color: #333333; margin-top: 0;">{{ $title }}</h2>
                <p style="font-size: 16px; color: #555555; line-height: 1.5;">
                    {{ $body }}
                </p>
            </td>
        </tr>

        <tr>
            <td style="padding: 20px; text-align: center; background-color: #f1f1f1;">
                <p style="font-size: 14px; color: #888888;">
                    &copy; {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
