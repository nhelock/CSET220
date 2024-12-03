<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 text-center">
        <h1>Welcome to Our Website</h1>
        @if(session('firstName'))
            <p class="mt-4">Hello, <strong>{{ session('firstName') }}</strong>! We're glad to see you again.</p>
            <a href="/logout" class="btn btn-primary">Log Out</a>
        @else
            <p class="mt-4">You're not logged in. Please log in to continue.</p>
            <a href="/login" class="btn btn-primary">Log In</a>
        @endif
    </div>
</body>
</html>
