<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white  text-gray-900">
                    <div class="">
                        <label for="">Foto Profil</label>
                        <img src="" alt="harusnya PP">
                    </div>
                    <div class="">
                        <label for="">Nama</label>
                        <input type="text" name="nisn" value="{{ $dataPribadi->user->name }}">
                    </div>
                    <div class="">
                        <label for="">Nisn</label>
                        <input type="text" name="nisn" value="{{ $dataPribadi->nisn }}">
                    </div>
                    <div class="">
                        <label for="">No Telp</label>
                        <input type="text" name="no_telp" value="{{ $dataPribadi->no_telp }}">
                    </div>
                    <div class="">
                        <label for="">Tempat/tgllahir</label>
                        <input type="text" name="tmp_lahir" value="{{ $dataPribadi->tempat_lahir }}">
                    </div>
                    <div class="">
                        <label for="">Agama</label>
                        <input type="text" name="agm" value="{{ $dataPribadi->agama }}">
                    </div>
                    <div class="">
                        <label for="">Laki-Laki</label>
                        <input disabled type="radio" value="Laki-Laki" name="kelamin"
                            {{ $dataPribadi->jenis_kelamin == 'Laki-Laki' ? 'checked' : '' }}>
                        <label for="">Perempuan</label>
                        <input disabled type="radio" value="Perempuan" name="kelamin"
                            {{ $dataPribadi->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
                    </div>
                    <div class="">
                        <label for="">Jurusan</label>
                        <input type="text" name="jrsn" value="{{ $dataPribadi->jurusan->nama_jurusan }}">
                    </div>
                    <!--variabel angkatan sebenarnya tamatan-->
                    <div class="">
                        <label for="">Tamatan</label>
                        <input type="text" name="angkatan" value="{{ $dataPribadi->angkatan }}">
                    </div>
                </div>
                <!-- start Data pekerjaan -->
                <div class="p-6 bg-white  mt-4 text-gray-900">
                    <p>Data Pekerjaan</p>
                    <div class="flex space-x-2">
                        <label for="">Nama Pekerjaan :</label>
                        @if ($dataPekerjaan->count() > 1)
                            {{-- Looping data pekerjaan alumni yang ada dua --}}
                            @foreach ($dataPekerjaan as $pekerjaan)
                                <p>{{ $pekerjaan->nama_pekerjaan }}</p>
                            @endforeach
                        @else
                            {{ $dataPekerjaan->first()->nama_pekerjaan ?? '-' }}
                        @endif
                    </div>
                    <div class="flex space-x-2">
                        <label for="">Nama Instansi :</label>
                        @if ($dataPekerjaan->count() > 1)

                            @foreach ($dataPekerjaan as $pekerjaan)
                                <p>{{ $pekerjaan->nama_instansi }}</p>
                            @endforeach
                        @else
                            {{ $dataPekerjaan->first()->nama_instansi ?? '-' }}
                        @endif
                    </div>
                    <div class="flex space-x-2">
                        <label for="">Alamat Instansi :</label>
                        @if ($dataPekerjaan->count() > 1)

                            @foreach ($dataPekerjaan as $pekerjaan)
                                <p>{{ $pekerjaan->alamat_instansi }}</p>
                            @endforeach
                        @else
                            {{ $dataPekerjaan->first()->alamat_instansi ?? '-' }}
                        @endif
                    </div>
                    <div class="flex space-x-2">
                        <label for="">Jabatan :</label>
                        @if ($dataPekerjaan->count() > 1)

                            @foreach ($dataPekerjaan as $pekerjaan)
                                <p>{{ $pekerjaan->jabatan }}</p>
                            @endforeach
                        @else
                            {{ $dataPekerjaan->first()->jabatan ?? '-' }}
                        @endif
                    </div>

                </div>
                <!-- endData pekerjaan -->
                <!-- start Data Pendidikan -->
                <div class="p-6 bg-white  mt-4 text-gray-900">
                    <p>Data Pendidikan</p>
                    <div class="flex space-x-2">
                        <label for="">Nama Universitas :</label>
                        @if ($dataPendidikan->count() > 1)
                            {{-- Looping data pekerjaan alumni yang ada dua --}}
                            @for ($i = 0; $i < $dataPendidikan->count(); $i++)
                                <p>{{ $dataPendidikan[$i]->nama_univ }}</p>
                                {{-- <p>{{ $dataPekerjaan[$i]->jabatan }}</p> --}}
                            @endfor
                        @else
                            {{ $dataPendidikan->first()->nama_univ ?? '-' }}
                        @endif
                    </div>
                    <div class="flex space-x-2">
                        <label for="">Fakultas :</label>
                        @if ($dataPendidikan->count() > 1)

                            @foreach ($dataPendidikan as $pendidikan)
                                <p>{{ $pendidikan->fakultas }}</p>
                            @endforeach
                        @else
                            {{ $dataPendidikan->first()->fakultas ?? '-' }}
                        @endif
                    </div>
                    <div class="flex space-x-2">
                        <label for="">Prodi :</label>
                        @if ($dataPendidikan->count() > 1)

                            @foreach ($dataPendidikan as $pendidikan)
                                <p>{{ $pendidikan->prodi }}</p>
                            @endforeach
                        @else
                            {{ $dataPendidikan->first()->prodi ?? '-' }}
                        @endif
                    </div>
                    <div class="flex space-x-2">
                        <label for="">Alamat Universitas :</label>
                        @if ($dataPendidikan->count() > 1)

                            @foreach ($dataPendidikan as $pendidikan)
                                <p>{{ $pendidikan->alamat_univ }}</p>
                            @endforeach
                        @else
                            {{ $dataPendidikan->first()->alamat_univ ?? '-' }}
                        @endif
                    </div>

                </div>
                <!-- endData Pendidikan -->

            </div>
        </div>
    </div>
</x-app-layout>

{{-- welcome --}}
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
                            <a href="{{ route('search') }}"
                                class="px-6 py-2 text-white rounded-full bg-primary hover:bg-gray-800">cari
                                alumni
                            </a>
                        </button>
                        <button>
                            <a href="{{ route('register') }}" class="hero___register">mendaftar </a>
                        </button>
                    </div>

                    <div
                        class="flex mt-[70px] lg:mt-[122px] space-x-10 md:space-x-[25px] justify-center md:justify-start items-center">
                        <a href="instagram"><img src="{{ asset('assets/instagram.svg') }}" alt="instagram" /></a>
                        <a href="facebook"><img src="{{ asset('assets/facebook.svg') }}" alt="facebook" /></a>
                        <a href="youtube"><img src="{{ asset('assets/youtube.svg') }}" alt="youtube" /></a>
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
            <div class="grid grid-cols-3 w-full gap-x-5 place-items-center">
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
                        <template x-teleport="body">
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
                            <img src="{{ asset('assets/register.svg') }}" alt="register" />
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
                            <img src="{{ asset('assets/validasi.svg') }}" alt="validasi" />
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
                            <img src="{{ asset('assets/login.svg') }}" alt="login" />
                        </div>
                        <h1 class="card__title">Login</h1>
                    </div>
                    <div class="card__body">
                        setelah akun anda diverivikasi, anda perlu login untuk masuk dan
                        menambahkan data anda juga untuk melanjutkan
                    </div>
                </div>
                <!-- todo card-3-->
                <!-- todo  card-4-->
                <div class="card">
                    <div class="card__header">
                        <div class="card___icon">
                            <img src="{{ asset('assets/add.svg') }}" alt="add" />
                        </div>
                        <h1 class="card__title">Tambah Data</h1>
                    </div>
                    <div class="card__body">
                        alumni perlu menambahkan data pribadi (wajib) ,
                        pekerjaan/pendidikan agar data tersebut dapat dicari
                    </div>
                </div>
                <!-- todo card-4-->
                <!-- todo  card-5-->
                <div class="card">
                    <div class="card__header">
                        <div class="card___icon">
                            <img src="{{ asset('assets/cari.svg') }}" alt="cari" />
                        </div>
                        <h1 class="card__title">Mencari data</h1>
                    </div>
                    <div class="card__body">
                        alumni maupun user dapat melakuan pencarian data berdasarkan nama
                        dan nisn
                    </div>
                </div>
                <!-- todo card-5-->
            </div>
            <!-- ! tutorial ================== -->
        </section>
        <!-- ! tutorial ================== -->

        <!-- ?faq -->
        <div id="faq" x-data="{
            activeAccordion: '',
            setActiveAccordion(id) {
                this.activeAccordion = (this.activeAccordion == id) ? '' : id
            }
        }" class="relative w-full max-w-3xl mt-12 mx-auto text-base py-5">
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
                    <a href="{{ route('search') }}">
                        <button>cari disii</button>
                    </a>
                </div>
            </div>
        </section>
        <!-- !CTA -->

        <!-- ? contact -->
        <section id="kontak" class="pt-[50px] lg:pt-[100px] md:px-5 lg:px-16 md:w-[80%] md:mx-auto">
            <div class="grid grid-col-1 md:grid-cols-2 items-start w-full">
                <div class="gap-y-4 grid grid-cols-1 md:grid-cols-1">
                    <!-- ============ -->
                    <div class="card__contact mx-auto">
                        <div class="card_header">
                            <img src="{{ asset('assets/email.svg') }}" alt="email" class="card__icon" />
                            <h1 class="card__title">email</h1>
                        </div>
                        <p class="card__desk break-words">smkn2padangpanjang@gmail.com</p>
                    </div>

                    <!-- ====================== -->
                    <div class="card__contact mx-auto">
                        <div class="card_header">
                            <img src="{{ asset('assets/talp.svg') }}" alt="email" class="card__icon" />
                            <h1 class="card__title">Phone</h1>
                        </div>
                        <p class="card__desk">081234565411</p>
                    </div>
                    <!-- ============= -->
                    <div class="card__contact mx-auto">
                        <div class="card_header">
                            <img src="{{ asset('assets/lokasi.svg') }}" alt="email" class="card__icon" />
                            <h1 class="card__title">Lokasi</h1>
                        </div>
                        <p class="card__desk">
                            Jl. Syech Ibrahim Musa No.26 Padang Panjang Timur
                        </p>
                    </div>
                </div>

                <div class="mt-5 md:mt-0">
                    <form action="" method=" post">
                        <label class="block text-sm">
                            <span class="label__input focus:shadow-outline-purple form-input">Nama</span>
                            <input name="nama" class="input__contact" placeholder="masukan nama anda" />
                        </label>
                        <div class="flex space-x-5 mt-10">
                            <label class="block text-sm w-full">
                                <span class="label__input focus:shadow-outline-purple form-input">Email</span>
                                <input name="email" type="email" class="input__contact"
                                    placeholder="masukan email anda" />
                            </label>
                            <label class="block text-sm w-full">
                                <span class="label__input focus:shadow-outline-purple form-input">subjek</span>
                                <input name="subjek" class="input__contact" placeholder="masukan subjek" />
                            </label>
                        </div>
                        <label class="block mt-10 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Pesan</span>
                            <textarea name="pesan"
                                class="block border border-gray-600 px-3 py-2 rounded-md w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                rows="3" placeholder="masukan pesan anda."></textarea>
                        </label>

                        <button type="submit"
                            class="hover:bg-gray-950 bg-primary px-5 py-2 rounded-md text-white font-semibold mt-10">
                            kirim
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    @include('template.utils.footer')
@endsection
