<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Include your CSS and JavaScript files -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <header>
        <!-- Include your header content -->
        <nav>
            <!-- Include your navigation links -->
        </nav>
    </header>

    <main class="my-5">
        @yield('content')
    </main>

    <footer>
        <!-- Include your footer content -->
    </footer>
</body>
</html>
