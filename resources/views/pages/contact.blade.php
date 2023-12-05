@extends('template.master')
@section('content')
    <div x-data>




        @if (session('message'))
            <div x-data="{
                bannerVisible: false,
                bannerVisibleAfter: 300,
            }" x-show="bannerVisible" x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="translate-x-40" x-transition:enter-end="-translate-x-0 lg:-translate-x-0"
                x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-40" x-init="setTimeout(() => { bannerVisible = true }, bannerVisibleAfter);
                setTimeout(() => { bannerVisible = false }, 3000);" x-cloak
                class="absolute top-7 right-0   lg:right-28 p-4 z-[99999]">
                <div class="px-3 py-2 capitalize bg-white border border-gray-100 rounded-md">
                    <div class="flex items-center space-x-3">

                        <div class="bg-primary/80 w-[40px] aspect-square rounded-md grid place-items-center">
                            <img src="{{ asset('assets/validation.svg') }}" alt="svg" class="w-[25px]">
                        </div>

                        <div class="flex flex-col font-medium text-[14px] ">
                            <span class="text-[#252525]/90">
                                {{ Session::get('message') }}
                            </span>
                            <span class="text-[#252525]/70 -mt-1 text-sm">
                                {{ Auth::user()->name }}
                            </span>
                        </div>

                        <div class="w-[100px] h-[50px] flex justify-end items-center ">
                            <button @click="bannerVisible=false;"
                                class=" bg-gray-200 rounded-full grid place-items-center min-h-[25px] max-h-[25px] min-w-[25px] max-w-[25px] text-black">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-[17px] h-[17px]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>

                        </div>
                    </div>
                </div>
        @endif


    </div>




    <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-0 -left-40 z-0"></div>

    <main>


        <!--?  navigasi ==========-->
        @include('template.utils.navbar')
        <!--!  navigasi ==========-->

        <!-- ? contact -->
        <section id="kontak" class="pt-[50px] mb-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-10 gap-y-10 lg:gap-y-0">
                <div class="flex flex-col w-full px-5 space-y-5">
                    <h1 class="font-bold text-[30px] capitalize">Hubungi Kami</h1>
                    <p class="font-normal text-black/70 leading-[25px] w-[70%]">
                        Hubungi kami jika anda punya saran atau keluhan agar kami menjadi lebih baik kedepannya
                    </p>

                    <div class="flex flex-col w-full space-y-8">
                        <div class="grid grid-cols-1 gap-y-4">
                            <!-- ============ -->
                            <div class="flex items-center justify-start space-x-3">
                                <div class="min-w-[40px] max-w-[45px] aspect-square shadow-md p-2 rounded-lg">
                                    <img src="{{ asset('assets/email.svg') }}" alt="email" class="w-full h-full" />
                                </div>
                                <p class="overflow-x-auto break-words card__desk">
                                    smkn2padangpanjang@gmail.com
                                </p>
                            </div>

                            <!-- ====================== -->

                            <div class="flex items-center justify-start space-x-3">
                                <div class="min-w-[40px] max-w-[45px] aspect-square shadow-md p-2 rounded-lg">
                                    <img src="{{ asset('assets/talp.svg') }}" alt="telp" class="w-full h-full" />
                                </div>
                                <p class="break-words card__desk">081234565411</p>
                            </div>

                            <!-- ============= -->

                            <div class="flex items-center justify-start space-x-3">
                                <div class="min-w-[40px] max-w-[45px] aspect-square shadow-md p-2 rounded-lg">
                                    <img src="{{ asset('assets/lokasi.svg') }}" alt="location" class="w-full h-full" />
                                </div>
                                <p class="card__desk min-w-[220px]">
                                    Jl. Syech Ibrahim Musa No.26 Padang Panjang Timur
                                </p>
                            </div>
                            <!-- -=== -->
                        </div>

                        <div class="mb-11">
                            <form action="{{ route('simpanContact') }}" method="POST">
                                @csrf
                                <label class="block text-sm">
                                    <span class="label__input focus:shadow-outline-purple form-input">Nama</span>
                                    <input name="nama" class="input__contact" placeholder="Masukan Nama Anda"
                                        value="{{ old('nama') }}" />

                                    <!-- error -->
                                    @error('nama')
                                        <p class="mt-1 text-rose-500">{{ $message }}</p>
                                    @enderror
                                    <!-- error -->
                                </label>
                                <div class="flex mt-5 space-x-5">
                                    <label class="block w-full text-sm">
                                        <span class="label__input focus:shadow-outline-purple form-input">Email</span>
                                        <input name="email" type="email" class="input__contact"
                                            placeholder="Masukan Email Anda" value="{{ old('email') }}" />

                                        <!-- error -->
                                        @error('email')
                                            <p class="mt-1 text-rose-500">{{ $message }}</p>
                                        @enderror
                                        <!-- error -->
                                    </label>
                                    <label class="block w-full text-sm">
                                        <span class="label__input focus:shadow-outline-purple form-input">Subjek</span>
                                        <input name="subjek" class="input__contact" placeholder="Masukan Subjek"
                                            value="{{ old('subjek') }}" />

                                        <!-- error -->
                                        @error('subjek')
                                            <p class="mt-1 text-rose-500">{{ $message }}</p>
                                        @enderror
                                        <!-- error -->
                                    </label>
                                </div>
                                <label class="block mt-5 text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Pesan</span>
                                    <textarea name="pesan"
                                        class="block w-full px-3 py-2 mt-1 text-sm border border-gray-600 rounded-md dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        rows="3" placeholder="Masukan Pesan Anda.">{{ old('pesan') }}</textarea>

                                    <!-- error -->
                                    @error('pesan')
                                        <p class="mt-1 text-rose-500">{{ $message }}</p>
                                    @enderror
                                    <!-- error -->
                                </label>

                                <button type="submit"
                                    class="px-16 py-2 mt-5 font-semibold text-white rounded-md hover:bg-gray-950 bg-primary">
                                    Kirim
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="w-full  min-h-[450px] max-h-[600px] rounded-md overflow-hidden shadow-lg p-3">
                    <div class="w-full h-full">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6882809520066!2d100.4182927743779!3d-0.4625936995328707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd5256a42809263%3A0x83bcff4acf01d06b!2sSMKN2%20Padang%20Panjang!5e0!3m2!1sen!2sid!4v1697872579587!5m2!1sen!2sid"
                            width="100%" height="100%" style="border: 0" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>
        <!-- !contact -->

        <!-- ?footer -->
    </main>
    @include('template.utils.footer')
    <!-- !footer -->
@endsection
