@extends('template.master')
@section('content')
    <main>
        <!--?  navigasi ==========-->
        @include('template.alumni.navigasi')

        <!--!  navigasi ==========-->
        <div class="relative top-5">
            <hr />
            <hr class="text-primary w-[33%] bg-primary h-[3px] absolute top-0 left-0" />
        </div>



        <section class="mt-10 mx-10 lg:min-h-[55vh]">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="my-5 md:my-0">
                    <h1 class="text-[40px] lg:text-[45px] font-bold">Academy Info</h1>
                    <p class="md:max-w-[60%]">Lengkapi data pendidikanmu,
                        Pendidikan adalah kunci untuk membuka pintu-pintu kesempatan
                    </p>

                    <a href="{{ route('adminDetailAlumni', $id_pribadi->id_pribadi) }}"
                        class="text-blue-500 underline-offset-8 underline mt-3 hidden md:block">Kembali</a>
                </div>

                <form
                    action="{{ route('updateAlumniPendidikan', [$id_pribadi->id_pribadi, $dataPendidikan->id_pendidikan]) }}"
                    method="post" class="w-full">
                    @csrf
                    @method('PATCH')
                    <div class="flex flex-col space-y-5 w-full">
                        <!-- nama_pekerjaan -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Nama Universitas</span>
                            <input type="text" name="nama_univ"
                                class="block w-full  mt-1 text-sm border border-gray-600 px-5 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="nama univ" value="{{ old('nama_univ', $dataPendidikan->nama_univ) }}" />

                            <!-- error -->
                            @error('nama_univ')
                                <p class="mt-1 text-rose-500">{{ $message }}</p>
                            @enderror
                            <!-- error -->
                        </label>

                        <!-- nama_pekerjaan -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Fakultas</span>
                            <input type="text" name="fakultas"
                                class="block w-full  mt-1 text-sm border border-gray-600 px-5 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="Nama Fakultas" value="{{ old('fakultas', $dataPendidikan->fakultas) }}" />

                            <!-- error -->
                            @error('fakultas')
                                <p class="mt-1 text-rose-500">{{ $message }}</p>
                            @enderror
                            <!-- error -->
                        </label>

                        <!-- jabatan -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Prodi</span>
                            <input type="text" name="prodi"
                                class="block w-full  mt-1 text-sm border border-gray-600 px-5 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="Prodi anda" value="{{ old('prodi', $dataPendidikan->prodi) }}" />

                            <!-- error -->
                            @error('prodi')
                                <p class="mt-1 text-rose-500">{{ $message }}</p>
                            @enderror
                            <!-- error -->
                        </label>

                        <!-- alamat instansi -->
                        <label class="block mt-10 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Alamat</span>
                            <textarea name="alamat_univ"
                                class="block border border-gray-600 px-3 py-2 rounded-md w-full  mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                rows="3" placeholder="masukan alamat universitas.">{{ old('alamat_univ', $dataPendidikan->alamat_univ) }}</textarea>

                            <!-- error -->
                            @error('alamat_univ')
                                <p class="mt-1 text-rose-500">{{ $message }}</p>
                            @enderror
                            <!-- error -->
                        </label>

                        <!-- submit  -->
                        <button type="submit"
                            class="submit hover:bg-gray-950 focus:outline-none focus:shadow-outline-purple">
                            Simpan
                        </button>
                    </div>
                    <a href="#" class="text-blue-500 underline-offset-8 underline mt-10 md:hidden block">kembali ke
                        Dashboard</a>
                </form>
            </div>
        </section>
    </main>
    @include('template.utils.footer')
@endsection
