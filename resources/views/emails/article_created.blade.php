{{-- resources/views/emails/article_created.blade.php --}}
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Article Created</title>
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
    <h1>Hello Chief Editor,</h1>
    <p>A new article has been created and is awaiting your review.</p>
    <p><strong>Article Title:</strong> {{ $article->title }}</p>
    <p>Please review the article and approve it for publishing.</p>
    <a href="{{ url('/admin/article/review/' . $article->slug) }}" class="btn">Review Article</a>
    <p class="footer">Thank you for your attention.</p>
</div>
</body>
</html>
