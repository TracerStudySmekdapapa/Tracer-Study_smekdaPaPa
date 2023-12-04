<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tracer Study Smekda - {{ $title }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')


</head>

<body class="relative overflow-x-hidden ">



    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
            <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
                <div class="flex flex-col overflow-y-auto md:flex-row">
                    <div class="h-32 md:h-auto md:w-1/2">
                        <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
                            src="{{ asset('assets/forgot-password-office.jpeg') }}" alt="Office" />
                        <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
                            src="{{ asset('assets/forgot-password-office-dark.jpeg') }}" alt="Office" />
                    </div>
                    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                        <div class="w-full">
                            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                                Lupa password
                            </h1>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Email</span>
                                <input type="email" name="email"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 rounded-md focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="masukan email anda yang aktif" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    <x-input-success :messages="session('status')" class="mt-2" />
                            </label>

                            <!-- You should use a button here, as the anchor is only used for the example  -->
                            <button type="submit"
                                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-primary hover:bg-black border border-transparent rounded-lg active:bg-purple-600  focus:outline-none focus:shadow-outline-purple">
                                {{ __('Email Password Reset Link') }}
                            </button>

                            <p class="mt-5">
                                <a class="capitalize text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                                    href="/login">
                                    Kembali ke halaman login
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>

</html>
