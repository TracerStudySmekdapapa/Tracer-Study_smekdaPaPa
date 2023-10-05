@extends('template.master')
@section('content')
    <main>
        <!--?  navigasi ==========-->
        <nav class="relative z-50 h-24 select-none grid md:grid-cols-2 items-start">
            <div class="navigation__main__title">
                <a href="#_" class="navigation__title__link"> Tracer Study </a>
            </div>

            <!-- ?navigasi menu ===========================-->
            <div class="grid grid-cols-3 gap-x-8 mt-5 md:mt-2">
                <a href="#" class="flex items-center space-x-3">
                    <div
                        class="min-w-[24px] min-h-[24px] bg-gray-400 rounded-full grid place-items-center text-white font-semibold">
                        1
                    </div>
                    <h1>Data Pribadi</h1>
                </a>

                <a href="#" class="flex items-center space-x-3">
                    <div
                        class="min-w-[24px] min-h-[24px] bg-primary rounded-full grid place-items-center text-white font-semibold">
                        2
                    </div>
                    <h1 class="link_active">Data Pekerjaan</h1>
                </a>

                <a href="#" class="flex items-center space-x-3">
                    <div
                        class="min-w-[24px] min-h-[24px] bg-gray-400 rounded-full grid place-items-center text-white font-semibold">
                        3
                    </div>
                    <h1>Data Pendidikan</h1>
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
                <h1 class="text-[40px] lg:text-[45px] font-bold">Profesianal Info</h1>
                <p class="md:max-w-[60%]">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor
                    quaerat nulla debitis nisi ullam laudantium ipsam rem eveniet facere
                    incidunt?
                </p>

                <a href="{{ route('/') }}"
                    class="text-blue-500 underline-offset-8 underline mt-3 hidden md:block">kembali ke
                    Dashboard</a>
            </div>

            <form action="{{ route('simpanDataPekerjaan', Auth::user()->id_user) }}" method="post" class="w-full">
                @csrf
                <div class="flex flex-col space-y-5 w-full">
                    <!-- nama_pekerjaan -->
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Nama Pekerjaan</span>
                        <input type="text" name="nama_pekerjaan"
                            class="block w-full md:w-[70%] mt-1 text-sm border border-gray-600 px-5 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="012345" />
                    </label>

                    <!-- nama_pekerjaan -->
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">nama Instansi</span>
                        <input type="text" name="nama_instansi"
                            class="block w-full md:w-[70%] mt-1 text-sm border border-gray-600 px-5 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Nama instansi" />
                    </label>

                    <!-- jabatan -->
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Jabatan</span>
                        <input type="text" name="jabatan"
                            class="block w-full md:w-[70%] mt-1 text-sm border border-gray-600 px-5 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="jabatan anda" />
                    </label>

                    <div class="grid w-full grid-cols-1 gap-5 md:grid-cols-2">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Tahun Masuk</span>
                            <input type="number" name="tahun_masuk"
                                class="block w-full md:w-[70%] mt-1 text-sm border border-gray-600 px-5 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="jabatan anda" />
                        </label>
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Tahun Keluar</span>
                            <input type="number" name="tahun_keluar"
                                class="block w-full md:w-[70%] mt-1 text-sm border border-gray-600 px-5 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="jabatan anda" />
                        </label>
                    </div>

                    <!-- alamat instansi -->
                    <label class="block mt-10 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">alamat</span>
                        <textarea name="alamat"
                            class="block border border-gray-600 px-3 py-2 rounded-md w-full md:w-[70%] mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            rows="3" placeholder="masukan alamat instansi."></textarea>
                    </label>

                    <!-- submit  -->
                    <button type="submit" class="submit hover:bg-gray-950 focus:outline-none focus:shadow-outline-purple">
                        kirim
                    </button>
                </div>
            </form>
        </div>
    </section>
    @include('template.utils.footer')
@endsection
