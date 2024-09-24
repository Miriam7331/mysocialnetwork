<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Links</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <!-- Navbar -->
    <header class="relative p-6">
        <!-- Log in and Register in the top-right corner -->
        <div class="absolute top-6 right-6">
            @if (Route::has('login'))
                <nav class="flex space-x-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>

        <!-- Logo in the center -->
        <div class="flex justify-center items-center">
            <img src="{{ asset('images/logo_community_links.png') }}" alt="Logo"
                 class="w-16 h-auto sm:w-24 md:w-32 lg:w-40">
        </div>
    </header>

    <!-- Main content -->
    <main class="flex flex-col items-center justify-center h-screen">
        <!-- Title & Subtitle -->
        <h1 class="text-5xl font-bold mb-4">Welcome to Community Links</h1>
        <p class="text-xl mb-8 text-gray-300">Share your links with a lot of people around the world</p>

        <!-- Buttons -->
        @if (Route::has('login'))
            <div class="flex space-x-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-[#FF2D20] hover:bg-[#FF2D20]/80 text-white font-semibold py-2 px-4 rounded-md">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="bg-[#FF2D20] hover:bg-[#FF2D20]/80 text-white font-semibold py-2 px-4 rounded-md">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-transparent border border-white hover:bg-white hover:text-black text-white font-semibold py-2 px-4 rounded-md">
                            Register
                        </a>
                    @endif
                @endauth
            </div>
        @endif
    </main>

    <!-- Footer -->
    <footer class="text-center py-4 bg-gray-800">
        <p>&copy; Community Links Company - 2024</p>
    </footer>
</body>
</html>
