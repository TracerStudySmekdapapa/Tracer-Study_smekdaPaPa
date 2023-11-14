@extends('template.master')
@section('content')
    <main>
        <!--?  navigasi ==========-->
        @include('template.alumni.navigasi')

        <!--!  navigasi ==========-->
        <div class="relative mt-0 md:-mt-20 lg:mt-5">
            <hr />
            <hr class="text-primary w-[33%] bg-primary h-[3px] absolute top-0 left-0" />
        </div>

        <section class="mt-10 mx-3 md:mx-6 lg:min-h-[55vh]">
            <div class="flex flex-col items-start justify-between md:flex-row">
                <div class="my-5 md:my-0">
                    <h1 class="text-[35px] lg:text-[45px] font-bold">Profesianal Info</h1>
                    <p class="text-[14px] md:text-base md:max-w-[70%] lg:max-w-[60%]">
                        Lengkapi data pekerjaanmu, dan jadilah bagian dari jaringan profesional yang saling mendukung dan
                        berkembang bersama.
                    </p>

                    <a href="{{ route('dashboard') }}"
                        class="hidden mt-3 text-blue-500 underline underline-offset-8 md:block">kembali
                        ke
                        Dashboard</a>
                </div>

                <form action="{{ route('updateDataPekerjaan', $data->id_pekerjaan) }}" method="post" class="w-full ">
                    @csrf
                    @method('PATCH')
                    <div class="flex flex-col w-full space-y-5">
                        <!-- nama_pekerjaan -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Nama Pekerjaan <span
                                    class="text-red-500">*</span></span>
                            <input type="text" name="nama_pekerjaan"
                                class="block w-full px-5 py-2 mt-1 text-sm border border-gray-600 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="Nama Pekerjaan" value="{{ old('nama_pekerjaan', $data->nama_pekerjaan) }}" />

                            <!-- error -->
                            @error('nama_pekerjaan')
                                <p class="mt-1 text-rose-500">{{ $message }}</p>
                            @enderror
                            <!-- error -->
                        </label>

                        <!-- nama_pekerjaan -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">nama Instansi <span
                                    class="text-red-500">*</span></span>
                            <input type="text" name="nama_instansi"
                                class="block w-full px-5 py-2 mt-1 text-sm border border-gray-600 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="Nama instansi" value="{{ old('nama_instansi', $data->nama_instansi) }}" />

                            <!-- error -->
                            @error('nama_instansi')
                                <p class="mt-1 text-rose-500">{{ $message }}</p>
                            @enderror
                            <!-- error -->
                        </label>

                        <!-- jabatan -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Jabatan (opsional)</span>
                            <input type="text" name="jabatan"
                                class="block w-full px-5 py-2 mt-1 text-sm border border-gray-600 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="jabatan anda" value="{{ old('jabatan', $data->jabatan) }}" />
                        </label>

                        <div class="grid w-full grid-cols-1 gap-5 md:grid-cols-2">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Tahun Masuk <span
                                        class="text-red-500">*</span></span>
                                <input type="number" name="tahun_masuk"
                                    class="block w-full px-5 py-2 mt-1 text-sm border border-gray-600 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="tahun masuk" value="{{ old('tahun_masuk', $data->thn_masuk) }}" />

                                <!-- error -->
                                @error('tahun_masuk')
                                    <p class="mt-1 text-rose-500">{{ $message }}</p>
                                @enderror
                                <!-- error -->
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Tahun Keluar (opsional)</span>
                                <input type="number" name="tahun_keluar"
                                    class="block w-full px-5 py-2 mt-1 text-sm border border-gray-600 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="!opsional" value="{{ old('tahun_keluar', $data->thn_keluar) }}" />

                                <!-- error -->
                                @error('tahun_keluar')
                                    <p class="mt-1 text-rose-500">{{ $message }}</p>
                                @enderror
                                <!-- error -->
                            </label>
                        </div>

                        <!-- alamat instansi -->
                        <label class="block mt-10 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Alamat <span class="text-red-500">*</span></span>
                            <textarea name="alamat"
                                class="block w-full px-3 py-2 mt-1 text-sm border border-gray-600 rounded-md dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                rows="3" placeholder="Masukan Alamat Instansi.">{{ old('alamat', $data->alamat_instansi) }}</textarea>

                            <!-- error -->
                            @error('alamat')
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
                </form>
            </div>
        </section>
    </main>
    @include('template.utils.footer')
@endsection
