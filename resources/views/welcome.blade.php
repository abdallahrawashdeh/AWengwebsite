<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AW Engineering Administrator</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Animation -->
    <style>
@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-slide-up {
    animation: slideUp 0.8s ease-out forwards;
}

.animate-slide-down {
    animation: slideDown 0.8s ease-out forwards;
}
</style>

    <!-- Vite / Laravel Mix -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="font-sans h-screen bg-gray-100 px-10">

    <!-- Hero Section -->
    <main class="h-full flex items-center justify-center">
        <section class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center justify-between h-full">

                <!-- Left Side: Company Info -->
                <div class="w-full md:w-1/2 mb-8 md:mb-0 animate-slide-up">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                        Welcome to AW Engineering Administrator
                    </h1>
                </div>

                <!-- Right Side: Details and Buttons -->
                <div class="w-full md:w-1/2">
                    <div class="bg-white rounded-lg shadow-lg p-6 animate-slide-down">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Why Choose Us?</h2>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Industry-leading technology
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                24/7 customer support
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Customizable solutions
                            </li>
                        </ul>

                        @auth
                        <div class="flex flex-col justify-center gap-4">
                            <a href="{{ route('dashboard') }}" class="block text-center bg-green-600 text-white font-semibold px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300">
                                Go to Dashboard
                            </a>
                        </div>
                        @endauth

                        @guest
                        <div class="flex flex-col justify-center gap-4">
                            <a href="{{ route('login') }}" class="block text-center bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                                Log in
                            </a>
                            <a href="{{ route('register') }}" class="block text-center border border-blue-600 text-blue-600 font-semibold px-6 py-3 rounded-lg hover:bg-blue-50 transition duration-300">
                                Register
                            </a>
                        </div>
                        @endguest

                    </div>
                </div>
            </div>
        </section>
    </main>

</body>
</html>
