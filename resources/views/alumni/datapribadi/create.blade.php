@extends('template.master')
@section('content')
    <main>
        <!--?  navigasi ==========-->
        <nav class="relative z-50 grid items-start h-24 select-none md:grid-cols-2">
            <div class="navigation__main__title">
                <a href="#_" class="navigation__title__link"> Tracer Study </a>
            </div>

            <!-- ?navigasi menu ===========================-->
            <div class="grid grid-cols-3 mt-5 gap-x-10 md:mt-2">
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
        <div class="flex flex-col items-start justify-between md:flex-row">
            <div class="my-5 md:my-0">
                <h1 class="text-[40px] lg:text-[45px] font-bold">Personal Info</h1>
                <p class="md:max-w-[60%]">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor
                    quaerat nulla debitis nisi ullam laudantium ipsam rem eveniet facere
                    incidunt?
                </p>

                <a href="#" class="hidden mt-3 text-blue-500 underline underline-offset-8 md:block">kembali ke
                    Dashboard</a>
            </div>
            <form action="{{ route('simpanDataPribadi', Auth::user()->id_user) }}" method="post" class="w-full">
                <div class="flex flex-col w-full space-y-5">
                    @csrf
                    <!-- nisn -->
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">nisn</span>
                        <input type="number" name="nisn"
                            class="block w-full px-5 py-2 mt-1 text-sm border border-gray-600 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="012345" />
                    </label>

                    <div class="grid w-full grid-cols-1 gap-5 md:grid-cols-2">
                        <!--  agama  -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">agama</span>

                            <select name="agama"
                                class="block w-full px-10 py-2 mt-1 text-sm border border-gray-600 rounded-md appearance-none dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                <option disabled selected>agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">buddha</option>
                                <option value="Konghucu">konghucu</option>
                            </select>

                            <!-- error -->
                            <!-- <p class="mt-1 text-rose-500">invalid message</p> -->
                            <!-- error -->
                        </label>

                        <!--  tempat tgl lahit  -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">No Telp</span>
                            <input type="tel" name="no_telp"
                                class="block w-full px-6 py-2 mt-1 text-sm border border-gray-600 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="+00 xxx xxx xxx" />

                            <!-- error -->
                            <!-- <p class="mt-1 text-rose-500">invalid message</p> -->
                            <!-- error -->
                        </label>
                    </div>

                    <!--  tempat tgl lahit  -->
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Tempat Lahir</span>
                        <input name="tmp_lahir"
                            class="block w-full px-5 py-2 mt-1 text-sm border border-gray-600 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Padang Panjang " />
                    </label>
                    <!--  tempat tgl lahit  -->
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Tanggal Lahir</span>
                        <input name="tgl_lahir" type="date"
                            class="block w-full px-5 py-2 mt-1 text-sm border border-gray-600 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />

                        <!-- error -->
                        <p class="mt-1 text-rose-500">invalid message</p>
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
                        class="block w-full px-10 py-2 mt-1 text-sm border border-gray-600 rounded-md appearance-none dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                        <option disabled selected>Jurusan</option>
                        <option value="RPL">RPL</option>
                        <option value="MM">MM</option>
                        <option value="TKJ">TKJ</option>
                        <option value="PSPT">PSPT</option>
                    </select>

                    <div class="mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Tamatan
                        </span>
                        <select name="angkatan" id=""
                            class="block w-full px-10 py-2 mt-1 text-sm border border-gray-600 rounded-md appearance-none dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            <option disabled selected>Tamatan</option>
                            @for ($tahun = 2005; $tahun <= Carbon\Carbon::now()->year + 1; $tahun++)
                                <option value="{{ $tahun }}">
                                    {{ $tahun }}</option>
                            @endfor
                        </select>
                    </div>

                    <!-- submit  -->
                    <button type="submit"
                        class="w-full submit hover:bg-gray-950 focus:outline-none focus:shadow-outline-purple">
                        kirim
                    </button>
                </div>
            </form>
        </div>
    </section>
    @include('template.utils.footer')
@endsection
