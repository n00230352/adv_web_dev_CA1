<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background: #fff; /* White background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333; /* Dark text color */
        }
        .container {
            text-align: center;
            background: #2d2d2d; /* Dark grey box */
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            width: 90%;
            max-width: 400px;
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            color: #fff; /* White heading */
        }
        p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            color: #ddd; /* Light grey text for the paragraph */
        }
        .buttons {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        .buttons a {
            text-decoration: none;
            font-size: 1.25rem;
            padding: 0.75rem 1rem;
            border: 2px solid #fff; /* White border */
            color: #fff; /* White text */
            background: transparent;
            border-radius: 4px;
            transition: all 0.3s ease-in-out;
        }
        .buttons a:hover {
            background: #fff; /* White background on hover */
            color: #2d2d2d; /* Dark grey text on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Laravel</h1>
        <div class="buttons">
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Sign Up</a>
        </div>
    </div>
</body>
</html>
