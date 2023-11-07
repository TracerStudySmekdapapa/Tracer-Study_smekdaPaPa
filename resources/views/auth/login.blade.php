@extends('template.master')
@section('content')
    @if (session('error'))
        <div class="absolute top-0 right-0 p-4">
            <h1 class="px-4 py-2.5 bg-red-600 font-bold uppercase rounded-md text-white">
                {{ session('error') }}
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


                            {{--  <div>
                                <div class="my-5 h-full  flex justify-between items-center">
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
                                <div class="flex-grow-1 w-full min-h-3  ">
                                    <input id="finalHasil" type="number"
                                        class="block w-full h-full text-center py-1.5 border border-gray-200 rounded-full"
                                        placeholder="hasil dari jawaban diatas ?">
                                </div>

                            </div> --}}


                            <!-- submit  -->
                            <button id="tombolSubmit" type="submit" class="submit  ">
                                Log in
                            </button>
                        </form>

                        <!--  -->

                        <!-- forgot password -->
                        <p class="mt-4">
                            <a class="text-sm  font-medium text-purple-600 dark:text-purple-400 hover:underline"
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

            function getRandomData() {
                return Math.floor(Math.random() * 100);
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


            let countFirst = getRandomData() + 10;
            // medendapatkan random angka kedua
            let countSecond = getRandomData() - 10;
            // medendapatkan random operator aritmatika
            // const aritmatikaOperator = ['+', '-', 'X', '/'];
            const aritmatikaOperator = ['+', '-'];
            const RandomAritmatikaOperator = Math.floor(Math.random() * aritmatikaOperator.length);


            // operasi aritmatika dan penyimoanan hasil akhir
            let hasilAkhirTrue;
            hasilAkhirTrue = aritmatikaOperator[RandomAritmatikaOperator] == '+' ? countFirst + countSecond :
                aritmatikaOperator[RandomAritmatikaOperator] == '-' ? countFirst - countSecond : '';
            // aritmatikaOperator[RandomAritmatikaOperator] == '/' ? countFirst / countSecond : '';
            console.info(hasilAkhirTrue);

            // memasukan ke tampilan
            angkaPertama.textContent = countFirst;
            jenisAritmatika.textContent = aritmatikaOperator[RandomAritmatikaOperator];
            angkaKedua.textContent = countSecond;

            // mendapatkan hasil user

            finalHasil.addEventListener('keyup', (e) => {
                if (e.target.value == hasilAkhirTrue) {

                    cekKondisiAritmatika(true)
                } else {
                    cekKondisiAritmatika(false)
                }

            })




        }
        // jalanKanScript();
    </script>
@endsection
