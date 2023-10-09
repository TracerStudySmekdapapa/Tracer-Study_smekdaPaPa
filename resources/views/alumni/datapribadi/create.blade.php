@extends('template.master')
@section('content')
    <main>
        <!--?  navigasi ==========-->

        <!--!  navigasi ==========-->
        <div class="relative  ">
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

                    <a href="{{ route('alumniDashboard') }}"
                        class="hidden mt-3 text-blue-500 underline underline-offset-8 md:block">kembali ke
                        Dashboard</a>
                </div>
                <form action="{{ route('simpanDataPribadi', Auth::user()->id_user) }}" method="post" class="w-full">
                    <div class="flex flex-col w-full space-y-5">
                        @csrf
                        <!-- nisn -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">NISN</span>
                            <input type="number" name="nisn"
                                class="block w-full px-5 py-2 mt-1 text-sm border border-gray-600 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="0123456789" max="10" />
                        </label>

                        <div class="grid w-full grid-cols-1 gap-5 md:grid-cols-2">
                            <!--  agama  -->
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Agama</span>

                                <select name="agama"
                                    class="block w-full px-10 py-2 mt-1 text-sm border border-gray-600 rounded-md appearance-none dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                    <option disabled selected>agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
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
                                        class="w-[22px] h-[22px] text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        name="jenis_kelamin" value="Laki-Laki" />
                                    <span class="ml-2 text-[15px]">laki laki</span>
                                </label>
                                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                    <input type="radio"
                                        class="w-[22px] h-[22px] text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        name="jenis_kelamin" value="Perempuan" />
                                    <span class="ml-2 text-[15px]">perempuan</span>
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
                            <select name="tamatan" id=""
                                class="block w-full px-10 py-2 mt-1 text-sm border border-gray-600 rounded-md appearance-none dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                <option disabled selected>Tamatan</option>
                                @for ($tahun = Carbon\Carbon::now()->year + 1; $tahun >= 2005; --$tahun)
                                    <option value="{{ $tahun }}">
                                        {{ $tahun }}</option>
                                @endfor
                            </select>
                        </div>

                        <!-- submit  -->
                        <button type="submit"
                            class="w-full submit hover:bg-gray-950 focus:outline-none focus:shadow-outline-purple">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>
    @include('template.utils.footer')
@endsection
