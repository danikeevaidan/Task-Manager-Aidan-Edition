<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<header class="navbar">
    <div class="navbar-brand">
        <a href="/">Task Manager</a>
    </div>
    <div class="navbar-links">
        <a href="/login" class="btn">Log in</a>
        <a href="/register" class="btn btn-signup">Sign up</a>
    </div>
</header>

<main>
    @yield('content')
</main>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa;
    }


    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #fff;
        padding: 1rem 2rem;
        border-bottom: 1px solid #eaeaea;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand a {
        font-size: 1.5rem;
        font-weight: bold;
        color: #333;
        text-decoration: none;
    }

    .navbar-links {
        display: flex;
        gap: 1rem;
    }

    .btn {
        padding: 0.5rem 1rem;
        border: 1px solid #007bff;
        background-color: #fff;
        color: #007bff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn:hover {
        background-color: #007bff;
        color: #fff;
    }

    .btn-signup {
        background-color: #007bff;
        color: #fff;
    }

    .btn-signup:hover {
        background-color: #0056b3;
    }

    main {
        padding: 2rem;
    }

    .page-container {
        max-width: 600px;
        margin: 0 auto;
        background-color: #fff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .page-container h1 {
        font-size: 2rem;
        margin-bottom: 1.5rem;
    }

    .page-container form {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .page-container form input {
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
    }

    .page-container form button {
        padding: 0.75rem;
        border: none;
        background-color: #007bff;
        color: #fff;
        font-size: 1rem;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .page-container form button:hover {
        background-color: #0056b3;
    }
</style>
</body>
</html>
