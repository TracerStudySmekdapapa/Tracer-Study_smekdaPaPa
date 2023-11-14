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
        <section class="mt-10 mx-3 md:mx-10 lg:min-h-[55vh]">
            <div class="flex flex-col items-start justify-between md:flex-row">
                <div class="my-5 md:my-0">
                    <h1 class="text-[35px] lg:text-[45px] font-bold">Personal Info</h1>
                    <p class="text-[14px] md:text-base md:max-w-[60%]">
                        Isi data pribadimu dengan benar dan lengkap.
                        Dapatkan kesempatan yang lebih luas dengan data pribadi yang lengkap.
                    </p>

                    <a href="{{ route('dashboard') }}"
                        class="hidden mt-3 text-blue-500 underline underline-offset-8 md:block">kembali ke
                        Dashboard</a>
                </div>
                <form action="{{ route('simpanDataPribadi', Auth::user()->id_user) }}" method="post" class="w-full">
                    <div class="flex flex-col w-full space-y-5">
                        @csrf
                        <!-- nisn -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">NISN <span
                                    class="mx-2 text-gray-600">(opsional)</span> </span>
                            <input type="number" name="nisn"
                                class="block w-full px-5 py-2 mt-1 text-sm border border-gray-600 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="0123456789" value="{{ old('nisn') }}" />

                            <!-- error -->
                            @error('nisn')
                                <p class="mt-1 text-rose-500">{{ $message }}</p>
                            @enderror
                            <!-- error -->
                        </label>

                        <div class="grid w-full grid-cols-1 gap-5 md:grid-cols-2">
                            <!--  agama  -->
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Agama <span
                                        class="text-red-500">*</span></span>

                                <select name="agama"
                                    class="block w-full px-10 py-2 mt-1 text-sm border border-gray-600 rounded-md appearance-none dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                    <option disabled selected>Agama</option>
                                    @foreach ($agama as $item)
                                        <option value="{{ $item }}" {{ old('agama') == $item ? 'selected' : '' }}>
                                            {{ $item }}
                                        </option>
                                    @endforeach
                                </select>

                                <!-- error -->
                                @error('agama')
                                    <p class="mt-1 text-rose-500">{{ $message }}</p>
                                @enderror
                                <!-- error -->
                            </label>

                            <!--  tempat tgl lahit  -->
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">No Telp <span class="text-red-500">*</span>
                                </span>
                                <input type="tel" name="no_telp"
                                    class="block w-full px-6 py-2 mt-1 text-sm border border-gray-600 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="+00 xxx xxx xxx" value="{{ old('no_telp') }}" />

                                <!-- error -->
                                @error('no_telp')
                                    <p class="mt-1 text-rose-500">{{ $message }}</p>
                                @enderror
                                <!-- error -->
                            </label>
                        </div>

                        <!--  tempat tgl lahit  -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Tempat Lahir <span class="text-red-500">*</span>
                            </span>
                            <input name="tmp_lahir"
                                class="block w-full px-5 py-2 mt-1 text-sm border border-gray-600 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="Tempat Lahir " value="{{ old('tmp_lahir') }}" />
                            <!-- error -->
                            @error('tmp_lahir')
                                <p class="mt-1 text-rose-500">{{ $message }}</p>
                            @enderror
                            <!-- error -->
                        </label>
                        <!--  tempat tgl lahit  -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Tanggal Lahir <span
                                    class="text-red-500">*</span></span>
                            <input name="tgl_lahir" type="date"
                                class="block w-full px-5 py-2 mt-1 text-sm border border-gray-600 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                value="{{ old('tgl_lahir') }}" />

                            <!-- error -->
                            @error('tgl_lahir')
                                <p class="mt-1 text-rose-500">{{ $message }}</p>
                            @enderror
                            <!-- error -->
                        </label>

                        <div class="mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                                Jenis Kelamin <span class="text-red-500">*</span>
                            </span>
                            <div class="mt-2">
                                <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                                    <input type="radio"
                                        class="w-[22px] h-[22px] text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        name="jenis_kelamin" value="Laki-Laki"
                                        {{ old('jenis_kelamin') == 'Laki-Laki' ? 'checked' : '' }} />
                                    <span class="ml-2 text-[15px]">laki laki</span>
                                </label>
                                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                    <input type="radio"
                                        class="w-[22px] h-[22px] text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        name="jenis_kelamin" value="Perempuan"
                                        {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }} />
                                    <span class="ml-2 text-[15px]">perempuan</span>
                                </label>
                            </div>
                        </div>

                        <div class="mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                                Jurusan <span class="text-red-500">*</span>
                            </span>
                            <select name="jurusan"
                                class="block w-full px-10 py-2 mt-1 text-sm border border-gray-600 rounded-md appearance-none dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                <option disabled selected>Jurusan</option>
                                @foreach ($jurusan as $data)
                                    <option value="{{ $data->id_jurusan }}"
                                        {{ old('jurusan') == $data->id_jurusan ? 'selected' : '' }}>
                                        {{ $data->nama_jurusan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                                Tamatan <span class="text-red-500">*</span>
                            </span>
                            <select name="tamatan" id=""
                                class="block w-full px-10 py-2 mt-1 text-sm border border-gray-600 rounded-md appearance-none dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                <option disabled selected>Tamatan</option>
                                @for ($tahun = Carbon\Carbon::now()->year; $tahun >= 2006; --$tahun)
                                    <option value="{{ $tahun }}" {{ old('tamatan') == $tahun ? 'selected' : '' }}>
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
