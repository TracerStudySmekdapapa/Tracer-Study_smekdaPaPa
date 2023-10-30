@extends('template.master')
@section('content')
    <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-20 -left-32 z-0"></div>
    <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-80 -right-52 z-0"></div>
    <main>
        @include('template.utils.navbar')




        <!-- ? section-hero ======== -->
        <section class="w-full mt-[30px] mb-[50px]">
            <div class="main__hero">
                <!-- left -->
                <div class="left__item">
                    <h1 class="title">Penelusuran Alumni</h1>
                    <h2 class="subTitle">SMK NEGERI 2 PADANG PANJANG</h2>
                    <p class="deskripsi">
                        Bantu kami meningkatkan kualitas pendidikan. Tracer study,
                        kontribusimu untuk pendidikan dan jendela untuk masa depanmu.
                    </p>

                    <div class="flex space-x-10 mt-[17px]">
                        <button class="inset-0">
                            <a href="" class="px-6 py-2 text-white rounded-full bg-primary hover:bg-gray-800">cari
                                alumni
                            </a>
                        </button>
                        <button>
                            <a href="" class="hero___register">mendaftar </a>
                        </button>
                    </div>

                    <div
                        class="flex mt-[70px] lg:mt-[122px] space-x-10 md:space-x-[25px] justify-center md:justify-start items-center">
                        <a href="instagram"><img src=" {{ asset('assets/instagram.svg') }}" alt="instagram" /></a>
                        <a href="facebook"><img src=" {{ asset('assets/facebook.svg') }}" alt="facebook" /></a>
                        <a href="youtube"><img src=" {{ asset('assets/youtube.svg') }}" alt="youtube" /></a>
                    </div>
                </div>

                <!-- right -->
                <div class="right__item">
                    <img src="{{ asset('assets/hero.png') }}" alt="hero" class="hero__image" />
                </div>
            </div>
        </section>
        <!-- ! section-hero ======== -->

        <!-- ?counter  -->
        <section class="lg:px-10 max-w-full xl:max-w-[70%] grid place-items-center mx-auto mt-[100px]">
            <div class="grid w-full grid-cols-3 gap-x-5 place-items-center">
                <div class="counter_contain">
                    <h1 class="counter_title">1000+</h1>
                    <p class="counter_desk">Terdaftar mendaftar</p>
                </div>

                <div class="counter_contain">
                    <h1 class="counter_title">320</h1>
                    <p class="counter_desk">telah bekerja</p>
                </div>

                <div class="counter_contain">
                    <h1 class="counter_title">550</h1>
                    <p class="counter_desk">Melanjutkan Pendidikan</p>
                </div>
            </div>
        </section>
        <!-- !counter  -->

        <!-- ? about ================== -->
        <section id="about" class="w-full pt-[120px] md:px-5 lg:px-0">
            <div class="main__about">
                <!--  ?eft -->
                <div class="left__item">
                    <img src="{{ asset('assets/about.jpg') }}" alt="about" />
                </div>

                <!--  right -->
                <div class="right__item">
                    <h1 class="text-[35px] font-semibold">Tentang Tracer Study</h1>
                    <p class="leading-[27px] text-black/80 relative -z-50">
                        Tracer study adalah studi pelacakan jejak lulusan perguruan tinggi
                        yang dilakukan untuk mengetahui hasil pendidikan yang telah
                        diterima oleh lulusan. Studi ini dilakukan dengan mengumpulkan
                        data dan informasi dari lulusan, baik secara langsung maupun tidak
                        langsung ...
                    </p>

                    <div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false"
                        class="relative z-50 w-auto h-auto">
                        <button @click="modalOpen=true"
                            class="px-5 py-2 font-semibold text-white rounded-lg bg-primary btn___signup">
                            Baca Selengkapnya
                        </button>

                        <!-- todo modal___content -->
                        <template x-teleport="main">
                            <div x-show="modalOpen"
                                class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen"
                                x-cloak>
                                <div x-show="modalOpen" x-transition:enter="ease-out duration-300"
                                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                    x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0" @click="modalOpen=false"
                                    class="absolute inset-0 w-full h-full bg-black bg-opacity-40"></div>
                                <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen"
                                    x-transition:enter="ease-out duration-300"
                                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave="ease-in duration-200"
                                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    class="relative w-full px-10 py-6 bg-white sm:max-w-2xl sm:rounded-lg">
                                    <div class="flex items-center justify-between pb-2">
                                        <h3 class="text-lg font-semibold">Tujuannya ?</h3>
                                        <button @click="modalOpen=false"
                                            class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="relative w-auto font-normal text-black/80">
                                        <p>Tujuan tracer study adalah untuk:</p>
                                        <ul class="list-disc text-black/60 text-[15px]">
                                            <li>
                                                Mengetahui keberhasilan lulusan dalam memasuki dunia
                                                kerja
                                            </li>
                                            <li>
                                                Mengetahui kesesuaian antara kompetensi lulusan dengan
                                                kebutuhan dunia kerja
                                            </li>
                                            <li>
                                                Mengetahui kepuasan lulusan terhadap pendidikan yang
                                                telah diterima
                                            </li>
                                            <li>
                                                Mengevaluasi efektivitas kurikulum dan proses
                                                pembelajaran
                                            </li>
                                        </ul>
                                        <p>
                                            Tracer study dapat dilakukan dengan berbagai metode,
                                            antara lain:
                                        </p>
                                        <ul class="list-disc text-black/60 text-[15px]">
                                            <li>Survei alumni</li>
                                            <li>Wawancara alumni</li>
                                            <li>Studi kasus</li>
                                            <li>Analisis data statistik</li>
                                        </ul>
                                        <p>sdsd</p>
                                        <ul class="list-disc text-black/60 text-[15px]">
                                            <li>Apakah Anda telah bekerja setelah lulus?</li>
                                            <li>Apa bidang pekerjaan Anda saat ini?</li>
                                            <li>
                                                Apakah Anda merasa kompetensi yang Anda peroleh di
                                                perguruan tinggi sesuai dengan pekerjaan Anda?
                                            </li>
                                            <li>
                                                Apakah Anda puas dengan pendidikan yang Anda peroleh
                                                di perguruan tinggi?
                                            </li>
                                            <li>
                                                Apakah ada saran untuk perbaikan pendidikan di
                                                perguruan tinggi?
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </template>
                        <!--todo modal___content -->
                    </div>
                </div>
            </div>
        </section>
        <!-- ! about ================== -->

        <!-- ? tutorial ================== -->
        <section id="tutorial" class="pt-[50px] lg:pt-[100px] md:px-10 lg:px-16">
            <h1 class="py-6 text-[#2525255] text-[20px] font-semibold">Tutorial</h1>
            <div class="main__tutorial">
                <!-- todo  card-1 -->
                <div class="card">
                    <div class="card__header">
                        <div class="card___icon">
                            <img src="public/assets/register.svg" alt="register" />
                        </div>
                        <h1 class="card__title">Registrasi</h1>
                    </div>
                    <div class="card__body">
                        alumni perlu melakukan registrasi terlebih dahulu untuk membuat
                        akun sebeum menambahkan datanya sendiri
                    </div>
                </div>
                <!-- todo card-1 -->
                <!-- todo  card-2 -->
                <div class="card">
                    <div class="card__header">
                        <div class="card___icon">
                            <img src="public/assets/validasi.svg" alt="validasi" />
                        </div>
                        <h1 class="card__title">Validasi</h1>
                    </div>
                    <div class="card__body">
                        setelah melakukan registrasi , akun yang dibuat perlu di setujui
                        oleh admin agar bisa melanjutkan ke proses selanjutnya
                    </div>
                </div>
                <!-- todo card-2 -->
                <!-- todo  card-3-->
                <div class="card">
                    <div class="card__header">
                        <div class="card___icon">
                            <img src="public/assets/login.svg" alt="login" />
                        </div>
                        <h1 class="card__title">Login</h1>
                    </div>
                    <div class="card__body">
                        setelah akun anda diverivikasi, anda perlu login untuk masuk dan
                        menambahkan data anda juga untuk melanjutkan
                    </div>
                </div>

                <a href=""
                    class="text-center block mt-11 mx-auto capitalize font-normal text-blue-600 border-b w-[200px] pb-2 border-blue-600">baca
                    selengkapnya
                </a>
        </section>
        <!-- ! tutorial ================== -->

        <!-- ?faq -->
        <div id="faq" x-data="{
            activeAccordion: '',
            setActiveAccordion(id) {
                this.activeAccordion = (this.activeAccordion == id) ? '' : id
            }
        }" class="relative w-full max-w-3xl py-5 mx-auto mt-12 text-base">
            <h1 class="py-6 text-[#2525255] text-[20px] font-semibold">FAQ ?</h1>
            <div x-data="{ id: $id('accordion') }"
                :class="{
                    'border-neutral-200/60 text-neutral-800': activeAccordion ==
                        id,
                    'border-transparent text-neutral-600 hover:text-neutral-800': activeAccordion != id
                }"
                class="duration-200 ease-out bg-white border rounded-md cursor-pointer group" x-cloak>
                <button @click="setActiveAccordion(id)"
                    class="flex items-center justify-between w-full px-5 py-4 font-semibold text-left select-none">
                    <span>Apa itu Tracer Studi ?</span>
                    <div :class="{ 'rotate-90': activeAccordion == id }"
                        class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-out">
                        <div class="absolute w-0.5 h-full bg-neutral-500 group-hover:bg-neutral-800 rounded-full"></div>
                        <div :class="{ 'rotate-90': activeAccordion == id }"
                            class="absolute w-full h-0.5 ease duration-500 bg-neutral-500 group-hover:bg-neutral-800 rounded-full">
                        </div>
                    </div>
                </button>
                <div x-show="activeAccordion==id" x-collapse x-cloak>
                    <div class="p-5 pt-0 opacity-70">
                        Tracer study adalah studi pelacakan jejak lulusan perguruan tinggi
                        yang dilakukan untuk mengetahui hasil pendidikan yang telah
                        diterima oleh lulusan.
                    </div>
                </div>
            </div>
            <div x-data="{ id: $id('accordion') }"
                :class="{
                    'border-neutral-200/60 text-neutral-800': activeAccordion ==
                        id,
                    'border-transparent text-neutral-600 hover:text-neutral-800': activeAccordion != id
                }"
                class="duration-200 ease-out bg-white border rounded-md cursor-pointer group" x-cloak>
                <button @click="setActiveAccordion(id)"
                    class="flex items-center justify-between w-full px-5 py-4 font-semibold text-left select-none">
                    <span>Apa fungsi dari Tracer Study?</span>
                    <div :class="{ 'rotate-90': activeAccordion == id }"
                        class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-out">
                        <div class="absolute w-0.5 h-full bg-neutral-500 group-hover:bg-neutral-800 rounded-full"></div>
                        <div :class="{ 'rotate-90': activeAccordion == id }"
                            class="absolute w-full h-0.5 ease duration-500 bg-neutral-500 group-hover:bg-neutral-800 rounded-full">
                        </div>
                    </div>
                </button>
                <div x-show="activeAccordion==id" x-collapse x-cloak>
                    <div class="p-5 pt-0 opacity-70">
                        untuk menilai relevansi lulusan perguruan tinggi dengan dunia
                        kerja. Tracer studi dilakukan dengan mengumpulkan data dari alumni
                        perguruan tinggi, seperti jenis pekerjaan yang ditekuni, tingkat
                        kepuasan terhadap pekerjaan, dan kompetensi yang dibutuhkan di
                        dunia kerja.
                    </div>
                </div>
            </div>
            <div x-data="{ id: $id('accordion') }"
                :class="{
                    'border-neutral-200/60 text-neutral-800': activeAccordion ==
                        id,
                    'border-transparent text-neutral-600 hover:text-neutral-800': activeAccordion != id
                }"
                class="duration-200 ease-out bg-white border rounded-md cursor-pointer group" x-cloak>
                <button @click="setActiveAccordion(id)"
                    class="flex items-center justify-between w-full px-5 py-4 font-semibold text-left select-none">
                    <span>Apakah perlu mengisi tracer study ?</span>
                    <div :class="{ 'rotate-90': activeAccordion == id }"
                        class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-out">
                        <div class="absolute w-0.5 h-full bg-neutral-500 group-hover:bg-neutral-800 rounded-full"></div>
                        <div :class="{ 'rotate-90': activeAccordion == id }"
                            class="absolute w-full h-0.5 ease duration-500 bg-neutral-500 group-hover:bg-neutral-800 rounded-full">
                        </div>
                    </div>
                </button>
                <div x-show="activeAccordion==id" x-collapse x-cloak>
                    <div class="p-5 pt-0 opacity-70">
                        Iya , Data-data yang dikumpulkan digunakan untuk menilai apakah
                        kurikulum dan proses pembelajaran di perguruan tinggi sudah sesuai
                        dengan kebutuhan dunia kerja.
                    </div>
                </div>
            </div>
        </div>
        <!-- !faq -->

        <!-- ?CTA -->
        <section class="mt-[50px] lg:mt-[100px] md:px-5 lg:px-16">
            <div class="main__CTA">
                <div>
                    <h1>Ayo mulai melakukan pencarian data !!</h1>
                    <p>cari data alumni berdasarkan nama ataun nisn</p>
                </div>

                <div>
                    <a href="">
                        <button>cari disii</button>
                    </a>
                </div>
            </div>
        </section>
        <!-- !CTA -->




    </main>
    @include('template.utils.footer')
@endsection
