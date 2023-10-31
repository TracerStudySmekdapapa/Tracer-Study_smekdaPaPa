{{-- menu ini ditampilkan khusus ketika menampilkan halaman tambah data pekerjaan & pendidikan --}}

<nav class="relative z-50  mx-2 md:-top-0 md:-mb-0 lg:-top-5  lg:-mb-5  select-none" x-data="{ showMenu: false }">
    <div class="navigation__main">
        <div class="navigation__main__title">
            <a href="{{ route('/') }}" class="navigation__title__link"> Tracer Study </a>
        </div>

        <div class="top-0 left-0 items-start hidden w-full h-full p-4 text-sm bg-gray-900 bg-opacity-50 md:items-center md:w-3/4 md:absolute lg:text-base md:bg-transparent md:p-0 md:relative md:flex"
            :class="{ 'flex fixed': showMenu, 'hidden': !showMenu }">
            <div class="container__mobile__menu">
                <a href="{{ route('/') }}" class="header__nav__mobile">
                    <h1 class="navigation__title__link">Tracer Study</h1>
                </a>

                <!-- ?navigasi menu ===========================-->

                <div class="navigation__content">


                </div>
                <!-- !navigasi menu ===========================-->

                <!-- ?navigasi menu login ===========================-->
                <div class="navigation__menu__accout">
                    @if (Auth::check())
                        {{-- ?profile --}}
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center space-x-1 text-base btn___signin md:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="w-5 h-5 mr-2">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span class="hover:cursor-pointer">Dashboard</span>
                        </a>
                        {{-- !end profile --}}


                        {{-- ? setting --}}
                        <a href="{{ route('profile.edit') }}"
                            class="cursor-pointer flex items-center space-x-1 text-base  btn___signin md:hidden"><svg
                                xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="w-5 h-5 mr-2">
                                <path
                                    d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z">
                                </path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                            <span class="hover:cursor-pointer">Setting</span>
                        </a>
                        {{-- !end setting --}}



                        {{-- ? logout --}}
                        <div class=" btn___signup md:hidden ">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="text-base flex items-center space-x-2 "><img
                                        src="{{ asset('assets/logout.svg') }}" alt=""><span>Log

                                        Out</span></button>
                            </form>
                        </div>
                        {{-- !end logout --}}
                        {{-- tampilan desktop --}}
                        @include('template.utils.menu')
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn___signin font-medium">Login</a>
                        <a href="{{ route('register') }}" class="btn___signup font-medium">Register</a>
                    @endif
                </div>
                <!-- !navigasi menu login ===========================-->

            </div>
        </div>

        <!-- menu  mobile-->
        <div @click="showMenu = !showMenu" class="navigation___mobile">
            <!-- hamburger menu -->
            <svg class="w-6 h-6 text-gray-800 -translate-x-2" x-show="!showMenu" fill="none" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <!-- close menu -->
            <svg class="w-6 h-6 text-gray-700 -translate-x-4" x-show="showMenu" fill="none" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                </path>
            </svg>
        </div>
    </div>
</nav>
