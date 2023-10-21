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

        <section class="mt-10 mx-10 lg:min-h-[55vh] ">
            <div class="flex justify-between items-start flex-col md:flex-row">
                <div class="my-5 md:my-0">
                    <h1 class="text-[40px] lg:text-[45px] font-bold">Profesianal Info</h1>
                    <p class="md:max-w-[60%]">
                        Lengkapi data pekerjaanmu, dan jadilah bagian dari jaringan profesional yang saling mendukung dan
                        berkembang bersama.
                    </p>

                    <a href="{{ route('alumniDashboard') }}"
                        class="text-blue-500 underline-offset-8 underline mt-3 hidden md:block">kembali
                        ke
                        Dashboard</a>
                </div>

                <form action="{{ route('simpanDataPekerjaan', Auth::user()->id_user) }}" method="post" class="w-full ">
                    @csrf
                    <div class="flex flex-col space-y-5 w-full">
                        <!-- nama_pekerjaan -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Nama Pekerjaan</span>
                            <input type="text" name="nama_pekerjaan"
                                class="block w-full  mt-1 text-sm border border-gray-600 px-5 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="Nama Pekerjaan" />
                        </label>

                        <!-- nama_pekerjaan -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">nama Instansi</span>
                            <input type="text" name="nama_instansi"
                                class="block w-full  mt-1 text-sm border border-gray-600 px-5 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="Nama instansi" />
                        </label>

                        <!-- jabatan -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Jabatan (opsional)</span>
                            <input type="text" name="jabatan"
                                class="block w-full  mt-1 text-sm border border-gray-600 px-5 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="jabatan anda" />
                        </label>

                        <div class="grid w-full grid-cols-1 gap-5 lg:grid-cols-2">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Tahun Masuk </span>
                                <input type="number" name="tahun_masuk"
                                    class="block w-full  mt-1 text-sm border border-gray-600 px-5 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="tahun masuk" />
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Tahun Keluar (opsional)</span>
                                <input type="number" name="tahun_keluar"
                                    class="block w-full  mt-1 text-sm border border-gray-600 px-5 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="!opsional" />
                            </label>
                        </div>

                        <!-- alamat instansi -->
                        <label class="block mt-10 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Alamat</span>
                            <textarea name="alamat"
                                class="block border border-gray-600 px-3 py-2 rounded-md w-full  mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                rows="3" placeholder="masukan alamat instansi."></textarea>
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
