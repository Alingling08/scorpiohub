<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} | Home</title>

    <link rel="icon" href="{{ asset('scorpiohub-logo.png') }}" type="image/png">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>
        <nav class="bg-gray-800" x-data="{ mobileOpen: false }">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex h-16 items-center justify-between">
                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                        <!-- Mobile menu button-->
                        <button type="button" @click="mobileOpen = !mobileOpen"
                            class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
                            <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
                            <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                        <a href="/" class="flex shrink-0 items-center">
                            <img class="h-8 w-auto" src="/images/scorpiohub.png" alt="{{ env('APP_NAME') }}">
                            <span class="rounded-md text-lg font-black text-white">{{ env('APP_NAME') }}</span>
                        </a>
                        <div class="hidden sm:ml-6 sm:block">
                            <div class="flex space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="/"
                                    class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white"
                                    aria-current="page">Dashboard</a>
                                <a href="{{ route('products.create') }}"
                                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Create
                                    Product</a>
                                <a href="{{ route('products.index') }}"
                                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">All
                                    Products</a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                        <button type="button"
                            class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">View notifications</span>
                            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                            </svg>
                        </button>

                        <!-- Profile dropdown -->
                        <div class="relative ml-3" x-data="{ open: false }">
                            <div>
                                <button type="button" @click="open = !open"
                                    class="relative flex rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">Open user menu</span>
                                    <img class="size-8 rounded-full" src="https://picsum.photos/200" alt="">
                                </button>
                            </div>

                            <!--
            Dropdown menu, show/hide based on menu state.

            Entering: "transition ease-out duration-100"
              From: "transform opacity-0 scale-95"
              To: "transform opacity-100 scale-100"
            Leaving: "transition ease-in duration-75"
              From: "transform opacity-100 scale-100"
              To: "transform opacity-0 scale-95"
          -->
                            <div x-show="open" @click.outside="open = false"
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white  shadow-lg ring-1 ring-black/5 focus:outline-hidden"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">

                                <div class="min-w-0 flex-auto px-4">
                                    <p class="text-sm/6 font-semibold text-gray-900">{{ auth()->user()->name }}</p>
                                    </p>
                                </div>

                                <hr>
                                <!-- Active: "bg-gray-100 outline-hidden", Not Active: "" -->
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                    tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                    tabindex="-1" id="user-menu-item-1">Settings</a>
                                <form action="{{ route('logout') }}" method="POST" class="m-0">
                                    @csrf
                                    <button type="submit"
                                        class="w-full flex-end focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium text-sm px-5 py-1.5  dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 cursor-pointer"
                                        role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div id="mobile-menu" x-show="mobileOpen" @click.away="mobileOpen = false">
                <div class="space-y-1 px-2 pt-2 pb-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="/" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white"
                        aria-current="page">Dashboard</a>
                    <a href="{{ route('products.create') }}"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Create
                        Product</a>
                    <a href="{{ route('products.index') }}"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">All
                        Products</a>
                </div>
            </div>
        </nav>
    </header>

    <main class="w-full mx-auto px-8">
        @if (session('success'))
            <div id="flash"
                class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
                role="alert">
                <svg class="w-6 h-6 text-green-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z"
                        clip-rule="evenodd" />
                </svg>

                <div class="ms-3 text-sm font-medium">
                    {{ session('success') }}
                </div>
            </div>
        @endif
        {{ $slot }}
    </main>

    <footer class="text-center border-t border-gray-300">
        <p>&copy; 2025 ScorpioHub. All rights reserved.</p>
    </footer>

    <script>
        setTimeout(function() {
            const flash = document.getElementById("flash");
            if (flash) {
                flash.style.display = "none";
            }
        }, 10000);
    </script>
</body>

</html>
