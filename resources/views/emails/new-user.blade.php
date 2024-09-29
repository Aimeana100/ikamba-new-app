<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Blog Platform</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
        }

        .credentials {
            background-color: #f1f1f1;
            padding: 10px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .credentials p {
            margin: 0;
        }

        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #999;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Welcome, {{ $newuser->name }}!</h2>

    <p>We're excited to have you join Ikamba platform! Below are your account credentials:</p>

    <div class="credentials">
        <p><strong> Email:</strong> {{ $newuser->email }}</p>
        <p><strong> Password:</strong> {{ $pass }}</p>
    </div>

    <p>You can log in by clicking the button below:</p>
    <a href="{{ route('login') }}" class="btn">Log in to Your Account</a>

    <p>If you have any questions, feel free to reach out to our support team.</p>

    <p>Thanks for joining us!</p>

    <p>Best regards,<br> The Ikamba Team</p>
</div>

<div class="footer">
    <p>&copy; {{ date('Y') }} Our Blog Platform. All rights reserved.</p>
</div>
</body>
</html>
