{{-- resources/views/emails/account_reactivated.blade.php --}}
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Account Has Been Reactivated</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            max-width: 600px;
            margin: 0 auto;
        }

        h1 {
            color: #333;
        }

        p {
            color: #555;
            font-size: 16px;
        }

        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            display: inline-block;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #999;
            margin-top: 30px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Hello {{ $user->name }},</h1>
    <p>Your account has been successfully reactivated.</p>
    <p>Here is your default password: <strong>{{ $defaultPassword }}</strong></p>
    <p>Please change your password after logging in to secure your account.</p>
    <a href="{{ url('/login') }}" class="btn">Login</a>
    <p class="footer">Thank you for using our application!</p>
</div>
</body>
</html>
