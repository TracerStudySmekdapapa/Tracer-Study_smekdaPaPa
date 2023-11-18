@extends('template.master')
@section('content')
    @if (session('error'))
        <div class="absolute top-0 right-0 p-4">
            <div x-data="{
                bannerVisible: false,
                bannerVisibleAfter: 300,
            }" x-show="bannerVisible" x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="translate-x-40" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-40" x-init="setTimeout(() => { bannerVisible = true }, bannerVisibleAfter);" x-cloak
                class="absolute top-7 right-28 p-4 z-[99999]">
                <div class="px-3 py-2 capitalize bg-white border border-gray-100 rounded-md">
                    <div class="flex items-center space-x-3">

                        <div class="bg-rose-500/80 w-[40px] aspect-square rounded-md grid place-items-center">
                            <img src="{{ asset('assets/login.svg') }}" alt="svg" class="w-[25px]">
                        </div>

                        <div class="flex flex-col font-medium text-[15px] ">
                            <span class="text-[#252525]/90">
                                {{ Session::get('error') }}
                            </span>
                            <span class="text-[#252525]/70 -mt-1 text-sm">
                                {{ Auth::user()->name ?? 'user' }}
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
                                    class="block w-full px-5 py-2 mt-1 text-sm border border-gray-600 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="example@gmail.com" value="{{ old('email') }}" />
                                <!-- error -->
                                @error('email')
                                    <p class="mt-1 text-rose-500">{{ $message }}</p>
                                @enderror
                                <!-- error -->
                            </label>

                            <!--  password  -->
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Password</span>
                                <input name="password"
                                    class="block w-full px-5 py-2 mt-1 text-sm border border-gray-600 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="***************" type="password" />

                                <!-- error -->
                                @error('password')
                                    <p class="mt-1 text-rose-500">{{ $message }}</p>
                                @enderror
                                <!-- error -->
                            </label>



                            <div class="flex justify-start items-start space-x-3 pt-3">
                                <input type="checkbox" id="chaptcha" class="peer/chaptcha checked:hidden">
                                <label for="chaptcha"
                                    class="  peer-checked/chaptcha:hidden text-[13px] text-black/70 capitalize font-medium">butktikan
                                    anda
                                    bukan
                                    robot</label>



                                <div class=" hidden peer-checked/chaptcha:block  max-w-[350px]">
                                    <div class="flex items-center justify-between h-full my-5 max-w-[350px]">
                                        <div id="angkaPertama"
                                            class="w-[150px]  border  border-gray-200 rounded-full grid place-items-center py-1.5">
                                            32
                                        </div>
                                        <div id="jenisAritmatika" class="w-[100px]  grid place-items-center py-1.5">
                                            +
                                        </div>
                                        <div id="angkaKedua"
                                            class="w-[150px]  border  border-gray-200 rounded-full grid place-items-center py-1.5">
                                            65
                                        </div>


                                    </div>
                                    <div class="w-full flex-grow-1 min-h-3 ">
                                        <input id="finalHasil" type="number"
                                            class="block w-full h-full text-center py-1.5 border border-gray-200 rounded-full"
                                            placeholder="hasil dari jawaban diatas ?">
                                    </div>

                                </div>
                            </div>


                            <!-- submit  -->
                            <button id="tombolSubmit" type="submit" class="submit ">
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
        // for debugging 
        function jalanKanScript() {

            const angkaPertama = document.getElementById('angkaPertama');
            const jenisAritmatika = document.getElementById('jenisAritmatika');
            const angkaKedua = document.getElementById('angkaKedua');
            const finalHasil = document.getElementById('finalHasil');
            const tombolSubmit = document.getElementById('tombolSubmit');

            // medendapatkan random angka pertama

            function getRandomData(param) {
                return Math.floor(Math.random() * param);
            }

            function cekKondisiAritmatika(param = false) {
                let isfinalHasilFill = finalHasil.value;
                if (isfinalHasilFill && param) {
                    //ada isi
                    tombolSubmit.classList.remove('bg-gray-500', 'cursor-no-drop');
                    tombolSubmit.classList.add(
                        'active:bg-purple-600', 'hover:bg-gray-950', 'focus:outline-none', 'focus:shadow-outline-purple'
                    );
                    tombolSubmit.type = 'submit';

                } else {
                    tombolSubmit.classList.add('bg-gray-500', 'cursor-no-drop');
                    tombolSubmit.classList.remove(
                        'active:bg-purple-600', 'hover:bg-gray-950', 'focus:outline-none', 'focus:shadow-outline-purple'
                    );
                    tombolSubmit.type = 'button';
                }
            }
            cekKondisiAritmatika();



            let isfinalHasilFill = finalHasil.textContent;
            if (isfinalHasilFill) {
                tombolSubmit.classList
            }


            let countFirst = getRandomData(100);
            let countSecond = getRandomData(20);
            const aritmatikaOperator = ['+', '-'];
            const RandomAritmatikaOperator = Math.floor(Math.random() * aritmatikaOperator.length);



            let hasilAkhirTrue;
            hasilAkhirTrue = aritmatikaOperator[RandomAritmatikaOperator] == '+' ? countFirst + countSecond :
                aritmatikaOperator[RandomAritmatikaOperator] == '-' ? countFirst - countSecond : '';
            console.info(hasilAkhirTrue);


            angkaPertama.textContent = countFirst;
            jenisAritmatika.textContent = aritmatikaOperator[RandomAritmatikaOperator];
            angkaKedua.textContent = countSecond;



            finalHasil.addEventListener('keyup', (e) => {
                if (e.target.value == hasilAkhirTrue) {

                    cekKondisiAritmatika(true)
                } else {
                    cekKondisiAritmatika(false)
                }

            })




        }
        jalanKanScript();
    </script>
@endsection
