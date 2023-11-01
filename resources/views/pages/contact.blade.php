@extends('template.master')
@section('content')
    <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-0 -left-40 z-0"></div>

    <main>


        <!--?  navigasi ==========-->
        @include('template.utils.navbar')
        <!--!  navigasi ==========-->

        <!-- ? contact -->
        <section id="kontak" class="pt-[50px] mb-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-10 gap-y-10 lg:gap-y-0">
                <div class="w-full flex flex-col space-y-5 px-5">
                    <h1 class="font-bold text-[30px] capitalize">get in touch</h1>
                    <p class="font-normal text-black/70 leading-[25px] w-[70%]">
                        Hubungi Kami jika anda punya saran atau keluhan ataupun keperluan
                        yang lain
                    </p>

                    <div class="w-full flex flex-col space-y-8">
                        <div class="gap-y-4 grid grid-cols-1">
                            <!-- ============ -->
                            <div class="flex justify-start items-center space-x-3">
                                <div class="min-w-[40px] max-w-[45px] aspect-square shadow-md p-2 rounded-lg">
                                    <img src="{{ asset('assets/email.svg') }}" alt="email" class="w-full h-full" />
                                </div>
                                <p class="card__desk break-words">
                                    smkn2padangpanjang@gmail.com
                                </p>
                            </div>

                            <!-- ====================== -->

                            <div class="flex justify-start items-center space-x-3">
                                <div class="min-w-[40px] max-w-[45px] aspect-square shadow-md p-2 rounded-lg">
                                    <img src="{{ asset('assets/talp.svg') }}" alt="telp" class="w-full h-full" />
                                </div>
                                <p class="card__desk break-words">081234565411</p>
                            </div>

                            <!-- ============= -->

                            <div class="flex justify-start items-center space-x-3">
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
                                    <input name="nama" class="input__contact" placeholder="masukan nama anda"
                                        value="{{ old('nama') }}" />

                                    <!-- error -->
                                    @error('nama')
                                        <p class="mt-1 text-rose-500">{{ $message }}</p>
                                    @enderror
                                    <!-- error -->
                                </label>
                                <div class="flex space-x-5 mt-5">
                                    <label class="block text-sm w-full">
                                        <span class="label__input focus:shadow-outline-purple form-input">Email</span>
                                        <input name="email" type="email" class="input__contact"
                                            placeholder="masukan email anda" value="{{ old('email') }}" />

                                        <!-- error -->
                                        @error('email')
                                            <p class="mt-1 text-rose-500">{{ $message }}</p>
                                        @enderror
                                        <!-- error -->
                                    </label>
                                    <label class="block text-sm w-full">
                                        <span class="label__input focus:shadow-outline-purple form-input">subjek</span>
                                        <input name="subjek" class="input__contact" placeholder="masukan subjek"
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
                                        class="block border border-gray-600 px-3 py-2 rounded-md w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        rows="3" placeholder="masukan pesan anda.">{{ old('pesan') }}</textarea>

                                    <!-- error -->
                                    @error('pesan')
                                        <p class="mt-1 text-rose-500">{{ $message }}</p>
                                    @enderror
                                    <!-- error -->
                                </label>

                                <button type="submit"
                                    class="hover:bg-gray-950 bg-primary px-16 py-2 rounded-md text-white font-semibold mt-5">
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
