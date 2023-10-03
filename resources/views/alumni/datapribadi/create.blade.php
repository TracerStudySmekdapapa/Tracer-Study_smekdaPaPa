@extends('template.master')
@section('content')
    <main>
        <!--?  navigasi ==========-->
        <nav class="relative z-50 h-24 select-none grid md:grid-cols-2 items-start">
            <div class="navigation__main__title">
                <a href="#_" class="navigation__title__link"> Tracer Study </a>
            </div>

            <!-- ?navigasi menu ===========================-->
            <div class="grid grid-cols-3 gap-x-10 mt-5 md:mt-2">
                <a href="#" class="flex items-center space-x-3">
                    <div
                        class="min-w-[24px] min-h-[24px] bg-primary rounded-full grid place-items-center text-white font-semibold">
                        1
                    </div>
                    <h1 class="link_active">Data Pribadi</h1>
                </a>

                <a href="#" class="flex items-center space-x-3">
                    <div
                        class="min-w-[24px] min-h-[24px] bg-gray-400 rounded-full grid place-items-center text-white font-semibold">
                        2
                    </div>
                    <h1>Data Pribadi</h1>
                </a>

                <a href="#" class="flex items-center space-x-3">
                    <div
                        class="min-w-[24px] min-h-[24px] bg-gray-400 rounded-full grid place-items-center text-white font-semibold">
                        3
                    </div>
                    <h1>Data Pribadi</h1>
                </a>
            </div>
            <!-- !navigasi menu ===========================-->
        </nav>
        <!--!  navigasi ==========-->
    </main>
    <div class="relative mt-16 md:-mt-3">
        <hr />
        <hr class="text-primary w-[33%] bg-primary h-[3px] absolute top-0 left-0" />
    </div>

    <section class="mt-10 mx-10 lg:min-h-[55vh]">
        <div class="flex justify-between items-start flex-col md:flex-row">
            <div class="my-5 md:my-0">
                <h1 class="text-[40px] lg:text-[45px] font-bold">Personal Info</h1>
                <p class="md:max-w-[60%]">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor
                    quaerat nulla debitis nisi ullam laudantium ipsam rem eveniet facere
                    incidunt?
                </p>

                <a href="#" class="text-blue-500 underline-offset-8 underline mt-3 hidden md:block">kembali ke
                    Dashboard</a>
            </div>
            <form action="{{ route('simpanDataPribadi', Auth::user()->id_user) }}" method="post" class="w-full">
                <div class="flex flex-col space-y-5 w-full">
                    @csrf
                    <!-- nisn -->
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">nisn</span>
                        <input type="number" name="nisn"
                            class="block w-full mt-1 text-sm border border-gray-600 px-5 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="012345" />
                    </label>

                    <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!--  agama  -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">agama</span>

                            <select name="agama"
                                class="block w-full mt-1 text-sm border border-gray-600 px-10 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                <option disabled selected>agama</option>
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="katolik">Katolik</option>
                                <option value="hindu">Hindu</option>
                                <option value="buddha">buddha</option>
                                <option value="konghucu">konghucu</option>
                            </select>

                            <!-- error -->
                            <!-- <p class="text-rose-500 mt-1">invalid message</p> -->
                            <!-- error -->
                        </label>

                        <!--  tempat tgl lahit  -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">No Telp</span>
                            <input type="tel" name="no_telp"
                                class="block w-full mt-1 text-sm border border-gray-600 px-6 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="+00 xxx xxx xxx" />

                            <!-- error -->
                            <!-- <p class="text-rose-500 mt-1">invalid message</p> -->
                            <!-- error -->
                        </label>
                    </div>

                    <!--  tempat tgl lahit  -->
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Tempat Lahir</span>
                        <input name="tmp_lahir"
                            class="block w-full mt-1 text-sm border border-gray-600 px-5 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Padang Panjang " />
                    </label>
                    <!--  tempat tgl lahit  -->
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Tanggal Lahir</span>
                        <input name="tgl_lahir" type="date"
                            class="block w-full mt-1 text-sm border border-gray-600 px-5 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />

                        <!-- error -->
                        <p class="text-rose-500 mt-1">invalid message</p>
                        <!-- error -->
                    </label>

                    <div class="mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Jenis Kelamin
                        </span>
                        <div class="mt-2">
                            <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                                <input type="radio"
                                    class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    name="jenis_kelamin" value="Laki-Laki" />
                                <span class="ml-2">laki laki</span>
                            </label>
                            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                <input type="radio"
                                    class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    name="jenis_kelamin" value="Perempuan" />
                                <span class="ml-2">perempuan</span>
                            </label>
                        </div>
                    </div>

                    <select name="jurusan"
                        class="block w-full mt-1 text-sm border border-gray-600 px-10 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                        <option readonly>Jurusan</option>
                        <option value="rpl">RPL</option>
                        <option value="mm">MM</option>
                        <option value="tkj">TKJ</option>
                        <option value="pspt">PSPT</option>
                    </select>

                    <!-- submit  -->
                    <button type="submit"
                        class="submit hover:bg-gray-950 focus:outline-none focus:shadow-outline-purple w-full">
                        kirim
                    </button>
                </div>
            </form>
        </div>
    </section>
    @include('template.utils.footer')
@endsection
