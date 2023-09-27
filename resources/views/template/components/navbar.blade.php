<nav class="relative z-50 h-24 select-none" x-data="{ showMenu: false }">
    <div class="navigation__main">
        <div class="navigation__main__title">
            <a href="#_" class="navigation__title__link"> Tracer Study </a>
        </div>

        <div class="top-0 left-0 items-start hidden w-full h-full p-4 text-sm bg-gray-900 bg-opacity-50 md:items-center md:w-3/4 md:absolute lg:text-base md:bg-transparent md:p-0 md:relative md:flex"
            :class="{ 'flex fixed': showMenu, 'hidden': !showMenu }">
            <div class="container__mobile__menu">
                <a href="#_" class="header__nav__mobile">
                    <h1 class="navigation__title__link">Tracer Study</h1>
                </a>

                <!-- ?navigasi menu ===========================-->
                <div class="navigation__content">
                    <a href="#_" class="ml-6 text-black navigation__content__link md:ml-0 lg:mx-3">Beranda</a>
                    <a href="#_"
                        class="ml-6 text-gray-700 navigation__content__link hover:text-black lg:mx-3">Tentang
                    </a>
                    <a href="#_"
                        class="ml-6 text-gray-700 navigation__content__link md:w-auto md:px-0 md:mx-2 hover:text-black lg:mx-3">Tutorial</a>
                    <a href="#_"
                        class="ml-6 text-gray-700 navigation__content__link md:w-auto md:px-0 md:mx-2 hover:text-black lg:mx-3">Kontak</a>
                    <a href="./src/halaman_cari.html" class="navigation___search">
                        <!-- search -->
                        <svg class="inline w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </a>
                </div>
                <!-- !navigasi menu ===========================-->

                <!-- ?navigasi menu login ===========================-->
                <div class="navigation__menu__accout">
                    @if (Auth::check())
                        <a href="./src/login.html" class="btn___signup">{{ Auth::user()->name }}</a>
                    @else
                        <a href="./src/login.html" class="btn___signin">Sign In</a>
                        <a href="./src/registrasi.html" class="btn___signup">Sign Up</a>
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
            <svg class="w-6 h-6 text-gray-700" x-show="showMenu" fill="none" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </div>
    </div>
</nav>
