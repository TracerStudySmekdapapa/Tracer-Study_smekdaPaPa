@extends('template.master')
@section('content')
    <main>
        <!--?  navigasi ==========-->
        <nav class="relative z-50 h-24 select-none grid md:grid-cols-2 items-start">
            <div class="navigation__main__title">
                <a href="{{ route('/') }}" class="navigation__title__link"> Tracer Study </a>
            </div>

            <!-- ?navigasi menu ===========================-->
            <div class="grid grid-cols-3 gap-x-8 mt-5 md:mt-2">
                <a href="{{ route('tambahDataPribadi') }}" class="flex items-center space-x-3">
                    <div
                        class="min-w-[24px] min-h-[24px] bg-gray-400 rounded-full grid place-items-center text-white font-semibold">
                        1
                    </div>
                    <h1>Data Pribadi</h1>
                </a>

                <a href="{{ route('tambahDataPekerjaan') }}" class="flex items-center space-x-3">
                    <div
                        class="min-w-[24px] min-h-[24px] bg-gray-400 rounded-full grid place-items-center text-white font-semibold">
                        2
                    </div>
                    <h1>Data Pekerjaan</h1>
                </a>

                <a href="{{ route('tambahDataPendidikan') }}" class="flex items-center space-x-3">
                    <div
                        class="min-w-[24px] min-h-[24px] bg-primary rounded-full grid place-items-center text-white font-semibold">
                        3
                    </div>
                    <h1 class="link_active">Data Pendidikan</h1>
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
                <h1 class="text-[40px] lg:text-[45px] font-bold">Academy Info</h1>
                <p class="md:max-w-[60%]">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor
                    quaerat nulla debitis nisi ullam laudantium ipsam rem eveniet facere
                    incidunt?
                </p>

                <a href="{{ route('alumniDashboard') }}"
                    class="text-blue-500 underline-offset-8 underline mt-3 hidden md:block">kembali ke
                    Dashboard</a>
            </div>

            <form action="{{ route('updateDataPendidikan', $data->id_pendidikan) }}" method="post" class="w-full">
                <div class="flex flex-col space-y-5 w-full">
                    @csrf
                    @method('PATCH')
                    <!-- nama_pekerjaan -->
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Nama Universitas</span>
                        <input type="text" name="nama_univ"
                            class="block w-full  mt-1 text-sm border border-gray-600 px-5 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="nama univ" value="{{ old('nama_univ', $data->nama_univ) }}" />
                    </label>

                    <!-- nama_pekerjaan -->
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Fakultas</span>
                        <input type="text" name="fakultas"
                            class="block w-full  mt-1 text-sm border border-gray-600 px-5 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Nama instansi" value="{{ old('fakultas', $data->fakultas) }}" />
                    </label>

                    <!-- jabatan -->
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Prodi</span>
                        <input type="text" name="prodi"
                            class="block w-full  mt-1 text-sm border border-gray-600 px-5 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Prodi anda" value="{{ old('prodi', $data->prodi) }}" />
                    </label>

                    <!-- alamat instansi -->
                    <label class="block mt-10 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Alamat</span>
                        <textarea name="alamat_univ"
                            class="block border border-gray-600 px-3 py-2 rounded-md w-full  mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            rows="3" placeholder="masukan alamat universitas.">{{ old('alamat_univ', $data->alamat_univ) }}</textarea>
                    </label>

                    <!-- submit  -->
                    <button type="submit" class="submit hover:bg-gray-950 focus:outline-none focus:shadow-outline-purple">
                        Simpan
                    </button>
                </div>
                <a href="#" class="text-blue-500 underline-offset-8 underline mt-10 md:hidden block">kembali ke
                    Dashboard</a>
            </form>
        </div>
    </section>
    @include('template.utils.footer')
@endsection
