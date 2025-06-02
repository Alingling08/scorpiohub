<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} | Reset Password</title>
    <link rel="icon" href="{{ asset('scorpiohub-logo.png') }}" type="image/png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-8 h-8 mr-2" src="/images/scorpiohub-logo.png" alt="logo">
                {{ env('APP_NAME') }}
            </a>
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Reset Password
                    </h1>
                    {{-- VALIDATION ERRORS --}}
                    @if ($errors->any())
                        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Danger</span>
                            <div>
                                <span class="font-medium">Ensure that requirements are met.</span>
                            </div>
                        </div>
                    @endif


                    <form class="max-w-sm mx-auto" action="{{ route('password.update') }}" method="POST"
                        data-loading-button>
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}" />
                        <div class="mb-5">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                                Address</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                placeholder="name@company.com" required=""
                                class="border text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 
                                @error('email') border-red-500 bg-red-50 text-red-900 @else border-gray-300 text-gray-900 @enderror">

                            @error('email')
                                <p class="mt-2 text-xs text-red-600 dark:text-red-500"><span
                                        class="font-medium">{{ $message }}</span></p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" required
                                class="border text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 
                                @error('password') border-red-500 bg-red-50 text-red-900 @else border-gray-300 text-gray-900 @enderror">

                            @error('password')
                                <p class="mt-2 text-xs text-red-600 dark:text-red-500"><span
                                        class="font-medium">{{ $message }}</span></p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="confirm-password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                password</label>
                            <input type="password" name="password_confirmation" id="confirm-password"
                                placeholder="••••••••" required
                                class="border text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 
                                @error('password') border-red-500 bg-red-50 text-red-900 @else border-gray-300 text-gray-900 @enderror">

                        </div>
                        <button type="submit" data-loading-button
                            class="w-full flex items-center justify-center gap-2 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            <svg data-spinner class="hidden animate-spin h-4 w-4 text-white"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z" />
                            </svg>

                            <span data-button-text>Reset Password</span>
                        </button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Already have an account? <a href="{{ route('show.login') }}"
                                class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login
                                here</a>
                        </p>
                    </form>

                </div>
            </div>
        </div>
    </section>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("reset-form");
        const button = document.getElementById("reset-button");
        const text = document.getElementById("button-text");

        if (!form || !button) {
            console.warn("Form or button not found");
            return;
        }
        form.addEventListener("submit", function() {
            button.disabled = true;
            button.classList.add("cursor-not-allowed", "opacity-50");

            if (text) text.textContent = "Please wait...";
            if (spinner) spinner.classList.remove("hidden");
        });

    });
</script>

</html>
