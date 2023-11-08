<nav class="relative z-50  mb-5   mx-5  select-none" x-data="{ showMenu: false }">
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
                    <a href="{{ route('/') }}#home"
                        class="ml-6 text-black navigation__content__link text-base py-1 md:ml-0 lg:mr-3">Beranda </a>
                    <a href="{{ route('/') }}#about"
                        class="ml-6 text-gray-700 navigation__content__link text-base py-1 hover:text-black lg:mr-3">Tentang
                    </a>
                    <a href="{{ route('tutorial') }}"
                        class="ml-6 text-gray-700 navigation__content__link text-base py-1 md:w-auto md:px-0 md:mx-2 hover:text-black lg:mr-3">Tutorial</a>
                    <a href="{{ route('tambahContact') }}"
                        class="ml-6 text-gray-700 navigation__content__link text-base py-1 md:w-auto md:px-0 md:mx-2 hover:text-black lg:mr-3">Kontak</a>
                    <a href="{{ route('search') }}" class="navigation___search">
                        <!-- search -->
                        <svg class="inline w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </a>

                </div>
                <!-- !navigasi menu ===========================-->

                <!-- ?navigasi menu login ===========================-->
                <div class="navigation__menu__accou ">
                    @if (Auth::check())
                        {{-- ?profile --}}
                        <a href=""
                            class="relative flex cursor-default select-none  items-center rounded px-2 py-1.5 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50">

                            <a href="{{ route('dashboard') }}"
                                class="flex items-center space-x-1 btn___signin md:hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-2">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span class="text-base">Dashboard</span>
                            </a>
                            {{-- !end profile --}}


                            {{-- ? setting --}}
                            <a href="{{ route('profile.edit') }}"
                                class="flex items-center space-x-1 btn___signin md:hidden"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="w-5 h-5 mr-2">
                                    <path
                                        d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z">
                                    </path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                <span class="text-base">Setting</span>
                            </a>
                            {{-- !end setting --}}



                            {{-- ? logout --}}


                            <div class=" btn___signup md:hidden">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="flex items-center space-x-2 "><img
                                            src="{{ asset('assets/logout.svg') }}" alt=""><span
                                            class="text-base">Log
                                            Out</span></button>
                                </form>
                            </div>
                            {{-- !end logout --}}
                            {{-- tampilan desktop --}}
                            @include('template.utils.menu')
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn___signin font-medium  ">Login</a>
                        <a href="{{ route('register') }}"
                            class="btn___signup font-medium text-[15px] min-h-[30px]">Register</a>
                    @endif
                </div>
                <!-- !navigasi menu login ===========================-->

            </div>
        </div>

        <!-- menu  mobile-->
        <div @click="showMenu = !showMenu" class="navigation___mobile ">
            <!-- hamburger menu -->
            <svg class="w-6 h-6 text-gray-800 -translate-x-6" x-show="!showMenu" fill="none" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <!-- close menu -->
            <svg class="w-6 h-6 text-gray-700  -translate-y-2 -translate-x-6 fixed" x-show="showMenu" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                </path>
            </svg>
        </div>
    </div>
</nav>
