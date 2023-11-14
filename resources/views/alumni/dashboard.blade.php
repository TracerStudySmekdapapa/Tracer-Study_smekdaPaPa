@extends('template.master')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.2/dist/full.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>




@section('content')


    <div x-data>



        @if (session('message'))
            <div x-data="{
                bannerVisible: false,
                bannerVisibleAfter: 300,
            }" x-show="bannerVisible" x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="translate-x-40" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-40" x-init="setTimeout(() => { bannerVisible = true }, bannerVisibleAfter);" x-cloak
                class="absolute top-7 right-28 p-4 z-[99999]">
                <div class="px-3 py-2 capitalize bg-white border border-gray-100 rounded-md">
                    <div class="flex items-center space-x-3">

                        <div class="bg-primary/80 w-[40px] aspect-square rounded-md grid place-items-center">
                            <img src="{{ asset('assets/validation.svg') }}" alt="svg" class="w-[25px]">
                        </div>

                        <div class="flex flex-col font-medium text-[15px] ">
                            <span class="text-[#252525]/90">
                                {{ Session::get('message') }}
                            </span>
                            <span class="text-[#252525]/70 -mt-1 text-sm">
                                {{ Auth::user()->name }}
                            </span>
                        </div>

                        <div class="w-[100px] h-[50px] flex justify-end items-center ">
                            <button @click="bannerVisible=false;"
                                class=" bg-gray-200 rounded-full grid place-items-center min-h-[25px] max-h-[25px] min-w-[25px] max-w-[25px] text-black">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-[17px] h-[17px]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>

                        </div>
                    </div>
                </div>
        @endif


    </div>








    </div>


    <!--link font -->
    <div class="w-[130px] h-[130px] bg-primary hidden  blur-[100px] absolute top-20 -left-32 z-0 lg:block"></div>
    <main>
        @include('template.utils.navbar')

        <section class="grid grid-cols-1 mt-10 capitalize md:grid-cols-2 gap-x-4 ">
            <div class="w-full min-h-[500px]  justify-center items-start pt-5 flex">
                <div class="flex flex-col items-center justify-start space-y-5">

                    {{-- ! data pribadi seperti nama bio dan email --}}
                    <div class="rounded-full w-[200px] h-[200px] overflow-hidden border-2 border-black">
                        <img src="{{ asset('assets/random/' . Auth::user()->profil_picture) }}" alt="gambar"
                            class="object-cover w-full h-full " />
                    </div>
                    <div class="text-[#252525] mx-1 mb-6 ">
                        <h1 class=" text-[20px] text-center  sm:text-[25px] lg:text-[30px] font-semibold pb-4 capitalize">
                            {{ $alumni->user->name ?? Auth::user()->name }}</h1>
                        <p
                            class="text-[13px] -mt-4 mb-5 text-black/60 font-light lg:pr-10 text-center lg:text-left max-w-[350px] min-w-[350px]">
                            {{ Auth::user()->bio ?? 'Belum Ada Bio' }}
                        </p>
                        @if ($alumni)
                            <table class="md:w-full text-black/80 w-[80%] sm:w-[90%]  mx-auto ">
                                @php
                                    $data = App\Helpers\EncryptionHelpers::encrypt($alumni->id_user);
                                @endphp
                                <tr class="divide-y">
                                    <td>nisn</td>
                                    <td class="px-6 py-2">:</td>
                                    <td>{{ $alumni->nisn ?? '-' }}</td>
                                </tr>
                                <!-- jenis_kelamin -->
                                <tr class="divide-y">
                                    <td>jenis kelamin</td>
                                    <td class="px-6 py-2">:</td>
                                    <td>{{ $alumni->jenis_kelamin ?? '-' }}</td>
                                </tr>
                                <!-- agama -->
                                <tr class="divide-y">
                                    <td>agama</td>
                                    <td class="px-6 py-2">:</td>
                                    <td>{{ $alumni->agama ?? '-' }}</td>
                                </tr>
                                <!-- tgl lair -->
                                <tr class="divide-y">
                                    <td>tempat lahir</td>
                                    <td class="px-6 py-2">:</td>
                                    <td>{{ $alumni->tempat_lahir ?? '-' }}</td>
                                </tr>
                                <tr class="divide-y">
                                    <td>tangal lahir</td>
                                    <td class="px-6 py-2">:</td>
                                    <td>{{ $alumni->tanggal_lahir ? Carbon\Carbon::parse($alumni->tanggal_lahir)->isoFormat('dddd, D MMMM Y') : '-' }}
                                    </td>
                                </tr>

                                <tr class="divide-y">
                                    <td>jurusan</td>
                                    <td class="px-6 py-2">:</td>
                                    <td>{{ $alumni->jurusan->nama_jurusan ?? '-' }}</td>
                                </tr>

                                <tr class="divide-y">
                                    <td>tamatan</td>
                                    <td class="px-6 py-2">:</td>
                                    <td>{{ $alumni->tamatan ?? '-' }}</td>
                                </tr>
                            </table>
                            <div class="flex justify-end w-full ">


                                <button
                                    class=" w-[80%] mx-auto mt-5 rounded-lg bg-transparent border border-primary hover:bg-black hover:border-transparent hover:text-white capitalize">
                                    <a href="{{ route('editDataPribadi', $data) }}" class="block px-5 py-2 text-sm">
                                        edit Data Pribadi
                                    </a>
                                </button>

                                <button
                                    class=" w-[80%] mx-auto mt-5 rounded-lg bg-transparent border border-primary hover:bg-black hover:border-transparent hover:text-white capitalize">
                                    <a href="{{ route('tambahSurvei') }}" class="block px-5 py-2 text-sm">
                                        isi survei
                                    </a>
                                </button>


                            </div>
                            {{-- ! jika tidak ada data pribadi --}}
                        @else
                            <table class="w-full -mt-2 text-black/70">
                                <tr class="">
                                    <td class="hidden lg:inline ">email</td>
                                    <td class="hidden px-6 py-2 lg:inline">:</td>
                                    <td class="text-center lowercase lg:text-left">{{ Auth::user()->email }}</td>
                                </tr>
                            </table>
                            <div class="flex justify-end w-full ">
                                <button
                                    class="w-[80%] mx-auto  text-sm mt-5 rounded-lg bg-transparent border border-primary hover:bg-black hover:border-transparent hover:text-white capitalize text-black/70">
                                    <a href="{{ route('tambahDataPribadi') }}" class="block px-5 py-1 text-sm md:py-2">
                                        + Data Pribadi
                                    </a>
                                </button>

                            </div>
                        @endif

                    </div>
                </div>
            </div>



            {{-- ! belum di verif dan isi data --}}
            <div class="w-full   min-h-[400px] max-h-[500px]   ">
                {{-- ? jika alumni punya data pribadi --}}
                @if ($alumni)
                    @if ($pekerjaan->count() > 0 || $pendidikan->count() > 0)
                        <!-- data lain -->
                        <div class="w-full min-h-[100px] mt-14  block">
                            <!-- data pekerjaan -->
                            <div class="w-full min-h-[300px] flex justify-stretch lg:px-20 md:px-5  ">
                                <ul class="steps steps-vertical ">
                                    @forelse ($pekerjaan->take(3) as $item)
                                        <li class="step step-primary">
                                            <div class="flex flex-col items-start justify-start">
                                                <h1 class="text-black/90 capitalize text-[20px]">
                                                    {{ $item->nama_pekerjaan }}
                                                </h1>
                                                <p>{{ $item->nama_instansi }}</p>
                                            </div>
                                        </li>
                                    @empty
                                        <h1>
                                            Tidak ada data pekerjaan
                                        </h1>
                                    @endforelse
                                </ul>
                            </div>
                            <div
                                class="flex flex-col items-center justify-center mx-2 space-y-5 md:space-y-0 md:flex-row md:space-x-5 lg:ml-32 ">
                                <a href="{{ route('tambahDataPekerjaan') }}"
                                    class="block w-full py-2 mx-auto text-sm text-center border rounded-lg border-primary text-black/90">+
                                    Data
                                    Pekerjaan</a>
                                <a href="{{ route('detailDataPekerjaan', $alumni->id_pribadi) }}"
                                    class="block w-full py-2 mx-auto text-sm text-center text-white border rounded-lg bg-primary active:bg-black active:text-white">lihat
                                    selengkapnya</a>
                            </div>


                            <hr class="my-5">

                            <!-- data pendidikan-->
                            <div class="w-full min-h-[300px] flex justify-stretch lg:px-20 md:px-5">
                                <ul class="steps steps-vertical">
                                    @forelse ($pendidikan as $item)
                                        <li class="step step-primary">
                                            <div class="flex flex-col items-start justify-start">
                                                <h1 class="text-black/90 capitalize text-[20px]">
                                                    {{ $item->nama_univ }}
                                                </h1>
                                                <p>{{ $item->fakultas }}</p>
                                            </div>
                                        </li>
                                        <!-- end looping herre -->

                                    @empty
                                        <h1>Tidak Ada Data Pendidikan</h1>
                                    @endforelse
                                </ul>
                            </div>
                            <div
                                class="flex flex-col items-center justify-center mx-2 space-y-5 md:space-y-0 md:flex-row md:space-x-5 lg:ml-32 ">
                                <a href="{{ route('tambahDataPendidikan') }}"
                                    class="block w-full py-2 mx-auto text-sm text-center border rounded-lg border-primary text-black/90">+
                                    Data
                                    Pendidikan</a>
                                <a href="{{ route('detailDataPendidikan', $alumni->id_pribadi) }}"
                                    class="block w-full py-2 mx-auto text-sm text-center text-white border rounded-lg bg-primary active:bg-black active:text-white">lihat
                                    selengkapnya</a>
                            </div>
                        </div>
                    @else
                        <ul class="h-full px-5 mt-5 steps steps-vertical md:px-10 lg:px-28 md:mt-0 lg:pt-20 ">
                            <li data-content="✓" class="step step-primary">Register</li>
                            <li data-content="✓" class="step step-primary">login</li>






                            {{-- jika data pribadi ada --}}
                            <li data-content="✓" class="step step-primary">
                                <p class="text-left">
                                    mengisi data pribadi
                                </p>
                            </li>








                            {{-- if user ini tidak punya role has role --}}
                            @if (Auth::user()->hasRole('Alumni'))
                                <li data-content="✓" class="step step-primary">
                                    <p class="text-left">
                                        menunggu verifikasi admin untuk melanjutkan
                                    </p>
                                </li>
                            @else
                                <li data-content="?" class="step step-neutral">
                                    <p class="text-left">
                                        menunggu verifikasi admin untuk melanjutkan
                                    </p>
                                </li>
                            @endif
                            {{-- else --}}

                            {{--  tidak diubah --}}
                            <li data-content="?" class="step step-neutral">
                                <p class="text-left">mengisi data pekerjaan
                                </p>
                            </li>
                            <li data-content="?" class="step step-neutral">
                                <p class="text-left">mengisi data pendidikan</p>
                            </li>

                        </ul>
                        @if (Auth::user()->hasRole('Alumni'))
                            <div class="flex justify-center mt-5 space-x-5">
                                <button
                                    class="capitalize bg-transparent border rounded-lg border-primary hover:bg-black hover:border-transparent">
                                    <a href="{{ route('tambahDataPekerjaan') }}"
                                        class="block px-5 py-2 text-sm text-black/70 hover:text-white">
                                        +
                                        data
                                        pekerjaan
                                    </a>
                                </button>
                                <button
                                    class="capitalize bg-transparent border rounded-lg border-primary hover:bg-black hover:border-transparent">
                                    <a href="{{ route('tambahDataPendidikan') }}"
                                        class="block px-5 py-2 text-sm text-black/70 hover:text-white ">
                                        +
                                        data
                                        Pendidikan
                                    </a>
                                </button>
                            </div>
                        @endif
                    @endif
                @else
                    {{-- jika data pekerjaan == 0 --}}
                    <ul
                        class="steps steps-vertical px-5 -mt-[100px] md:mt-0 lg:mt-10 lg:px-28 min-h-[200px] max-h-[500px] lg:min-h-[300px] lg:max-h-[700px]  ">
                        <li data-content="✓" class="step step-primary">Register</li>
                        <li data-content="✓" class="step step-primary">login</li>

                        {{-- jika data pribadi ada --}}
                        <li data-content="?" class="step step-neutral">
                            <p class="text-left">
                                mengisi data pribadi
                            </p>
                        </li>

                        {{-- if user ini tidak punya role has role --}}

                        <li data-content="?" class="step step-neutral">
                            <p class="text-left">
                                menunggu verivikasi admin untuk melanjutkan
                            </p>
                        </li>
                        {{-- else --}}

                        {{--  tidak diubah --}}
                        <li data-content="?" class="step step-neutral">
                            <p class="text-left">
                                mengisi data pekerjaan
                            </p>
                        </li>
                        <li data-content="?" class="step step-neutral">
                            <p class="text-left">
                                mengisi data pendidikan
                            </p>
                        </li>
                    </ul>
                @endif
            </div>
        </section>
    </main>

    @if ($alumni)
        {{-- ketika data pribadi kosong --}}
        @if ($pekerjaan->count() > 0 || $pendidikan->count() > 0)
            <div class="mt-[30rem] md:mt-72 lg:mt-40">
                @include('template.utils.footer')
            </div>
        @else
            <div class="mt-24 md:mt-10 lg:mt-0 ">
                @include('template.utils.footer')
            </div>
        @endif
    @else
        <div class="-mt-10">
            @include('template.utils.footer')
        </div>
    @endif
@endsection
