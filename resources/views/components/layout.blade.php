<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ScorpioHub | Home</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>
        <nav>
            <h1>ScorpioHub</h1>

            <a href="/">Home</a>
            <a href="{{ route('products.index') }}">All Products</a>
            <a href="{{ route('products.create') }}">Create Product</a>

        </nav>
    </header>

    <main class="container">
        {{ $slot }}


    </main>
    <footer class="text-center border-t border-gray-300">
        <p>&copy; 2025 ScorpioHub. All rights reserved.</p>
    </footer>
</body>

</html>
