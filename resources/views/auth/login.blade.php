@extends('template.master')
@section('content')
    @if (session('message'))
        <div class="absolute top-0 right-0 p-4">
            <h1 class="px-4 py-2.5 bg-green-600 font-bold uppercase rounded-md text-white">
                {{ session('message') }}
            </h1>
        </div>
    @endif
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
                        src="{{ asset('assets/login-office.jpeg') }}" alt="Office" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                            Login
                        </h1>

                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <!-- email -->
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Email</span>
                                <input name="email" type="email"
                                    class="block w-full mt-1 text-sm border border-gray-600 px-5 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="example@gmail.com" value="{{ old('email') }}" />
                                <!-- error -->
                                @error('email')
                                    <p class="text-rose-500 mt-1">{{ $message }}</p>
                                @enderror
                                <!-- error -->
                            </label>

                            <!--  password  -->
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Password</span>
                                <input name="password"
                                    class="block w-full mt-1 text-sm border border-gray-600 px-5 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="***************" type="password" />

                                <!-- error -->
                                @error('password')
                                    <p class="text-rose-500 mt-1">{{ $message }}</p>
                                @enderror
                                <!-- error -->
                            </label>

                            <!-- submit  -->
                            <button type="submit"
                                class="submit active:bg-purple-600 hover:bg-gray-950 focus:outline-none focus:shadow-outline-purple">
                                Log in
                            </button>
                        </form>

                        <!--  -->

                        <!-- forgot password -->
                        <p class="mt-4">
                            <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                                href="{{ route('password.request') }}">
                                Lupa password ?
                            </a>
                        </p>

                        <!-- create new account -->
                        <p class="mt-1">
                            <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                                href="{{ route('register') }}">
                                Buat akun baru
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function data() {
            function getThemeFromLocalStorage() {
                // if user already changed the theme, use it
                if (window.localStorage.getItem("dark")) {
                    return JSON.parse(window.localStorage.getItem("dark"));
                }

                // else return their preferences
                return (
                    !!window.matchMedia &&
                    window.matchMedia("(prefers-color-scheme: dark)").matches
                );
            }

            function setThemeToLocalStorage(value) {
                window.localStorage.setItem("dark", value);
            }

            return {
                dark: getThemeFromLocalStorage(),
                toggleTheme() {
                    this.dark = !this.dark;
                    setThemeToLocalStorage(this.dark);
                },
                isSideMenuOpen: false,
                toggleSideMenu() {
                    this.isSideMenuOpen = !this.isSideMenuOpen;
                },
                closeSideMenu() {
                    this.isSideMenuOpen = false;
                },
                isNotificationsMenuOpen: false,
                toggleNotificationsMenu() {
                    this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen;
                },
                closeNotificationsMenu() {
                    this.isNotificationsMenuOpen = false;
                },
                isProfileMenuOpen: false,
                toggleProfileMenu() {
                    this.isProfileMenuOpen = !this.isProfileMenuOpen;
                },
                closeProfileMenu() {
                    this.isProfileMenuOpen = false;
                },
                isPagesMenuOpen: false,
                togglePagesMenu() {
                    this.isPagesMenuOpen = !this.isPagesMenuOpen;
                },
                // Modal
                isModalOpen: false,
                trapCleanup: null,
                openModal() {
                    this.isModalOpen = true;
                    this.trapCleanup = focusTrap(document.querySelector("#modal"));
                },
                closeModal() {
                    this.isModalOpen = false;
                    this.trapCleanup();
                },
            };
        }
    </script>
@endsection
