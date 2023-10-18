@extends('template.master')
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.2/dist/full.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>
@section('content')
    <!--link font -->


    <body class="overflow-x-hidden relative capitalize">
        <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-20 -left-32 z-0"></div>
        <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-80 -right-52 z-0"></div>
        <main class="">


            @include('template.utils.navbar')

            <section class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
                <div class="w-full min-h-[500px]  justify-center items-start pt-5 flex">
                    <div class="flex flex-col space-y-5 justify-start items-center">

                        {{-- ! data pribadi seperti nama bio dan email --}}
                        <div class="rounded-full w-[200px] h-[200px] overflow-hidden border-2 border-black">
                            <img src="{{ asset('assets/random/' . Auth::user()->profil_picture) }}" alt="gambar"
                                class="w-full h-full object-cover " />
                        </div>
                        <div class="text-[#252525]  md:bg-teal-500 lg:bg-rose-600  mx-1  mb-6 ">
                            <h1
                                class=" text-[20px] text-center sm:text-[25px] lg:text-[30px] font-semibold pb-4 capitalize">
                                {{ $alumni->user->name ?? Auth::user()->name }}</h1>
                            <p
                                class="text-[13px] -mt-4 mb-5 text-black/60 font-light lg:pr-10 text-center lg:text-left max-w-[350px] min-w-[350px]">
                                {{ Auth::user()->bio ?? 'Belum Ada Bio' }}
                            </p>
                            @if ($alumni)
                                <table class="md:w-full text-black/80 w-[80%] sm:w-[90%]  mx-auto bg-red-600">
                                    <tr class="divide-y">
                                        <td>nisn</td>
                                        <td class="py-2 px-6">:</td>
                                        <td>{{ $alumni->nisn ?? '-' }}</td>
                                    </tr>
                                    <!-- jenis_kelamin -->
                                    <tr class="divide-y">
                                        <td>jenis kelamin</td>
                                        <td class="py-2 px-6">:</td>
                                        <td>{{ $alumni->jenis_kelamin ?? '-' }}</td>
                                    </tr>
                                    <!-- agama -->
                                    <tr class="divide-y">
                                        <td>agama</td>
                                        <td class="py-2 px-6">:</td>
                                        <td>{{ $alumni->agama ?? '-' }}</td>
                                    </tr>
                                    <!-- tgl lair -->
                                    <tr class="divide-y">
                                        <td>tempat lahir</td>
                                        <td class="py-2 px-6">:</td>
                                        <td>{{ $alumni->tempat_lahir ?? '-' }}</td>
                                    </tr>
                                    <tr class="divide-y">
                                        <td>tangal lahir</td>
                                        <td class="py-2 px-6">:</td>
                                        <td>{{ $alumni->tanggal_lahir ? Carbon\Carbon::parse($alumni->tanggal_lahir)->isoFormat('dddd, D MMMM Y') : '-' }}
                                        </td>
                                    </tr>

                                    <tr class="divide-y">
                                        <td>jurusan</td>
                                        <td class="py-2 px-6">:</td>
                                        <td>{{ $alumni->jurusan ?? '-' }}</td>
                                    </tr>

                                    <tr class="divide-y">
                                        <td>tamatan</td>
                                        <td class="py-2 px-6">:</td>
                                        <td>{{ $alumni->tamatan ?? '-' }}</td>
                                    </tr>
                                </table>
                                <div class="w-full bg-red justify-end flex ">


                                    <button
                                        class=" w-[80%] mx-auto mt-5 rounded-lg bg-transparent border border-primary hover:bg-black hover:border-transparent hover:text-white capitalize">
                                        <a href="{{ route('editDataPribadi', $alumni->id_user) }}" class="block px-5 py-2">
                                            edit Data Pribadi
                                        </a>
                                    </button>


                                </div>
                                {{-- ! jika tidak ada data pribadi --}}
                            @else
                                <table class="w-full text-black/70 -mt-5">
                                    <tr class="">
                                        <td class="hidden lg:inline">email</td>
                                        <td class="py-2 px-6 hidden lg:inline">:</td>
                                        <td class="text-center lg:text-left">{{ Auth::user()->email }}</td>
                                    </tr>
                                </table>
                                <div class="w-full  justify-end flex ">
                                    <button
                                        class="w-[80%] mx-auto  mt-5 rounded-lg bg-transparent border border-primary hover:bg-black hover:border-transparent hover:text-white capitalize text-black/70">
                                        <a href="{{ route('tambahDataPribadi') }}" class="block px-5 py-1 md:py-2 ">
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
                            <div class="w-full min-h-[100px] mt-14 bg-teal-500 block">
                                <!-- data pekerjaan -->
                                <div class="w-full min-h-[400] max-h-[500px] flex justify-stretch px-20 bg-yellow-300 ">
                                    <ul class="steps steps-vertical h-[100px]">
                                        @foreach ($pekerjaan->take(3) as $item)
                                            <li class="step step-primary">
                                                <div class="flex justify-start items-start flex-col">
                                                    <h1 class="text-black/90 capitalize text-[20px]">
                                                        {{ $item->nama_pekerjaan }}
                                                    </h1>
                                                    <p>{{ $item->nama_instansi }}</p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="flex space-x-5 items-center lg:ml-32">
                                    <a href="{{ route('tambahDataPekerjaan') }}"
                                        class="rounded-lg px-10   py-2 border block text-center border-primary text-black/90">+
                                        Data
                                        Pekerjaan</a>
                                    <a href="{{ route('detailDataPekerjaan', $alumni->id_alumni) }}"
                                        class="block px-6 py-2 rounded-lg text-white bg-blue-500 active:bg-black active:text-white border">lihat
                                        selengkapnya</a>
                                </div>


                                <hr class="my-5">

                                <!-- data pendidikan-->
                                <div class="w-full min-h-[300px] flex justify-stretch px-20">
                                    <ul class="steps steps-vertical">
                                        @forelse ($pendidikan as $item)
                                            <li class="step step-primary">
                                                <div class="flex justify-start items-start flex-col">
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
                                <div class="flex space-x-5 items-center lg:ml-32 ">
                                    <a href="{{ route('tambahDataPendidikan') }}"
                                        class="rounded-lg px-10   py-2 border block text-center border-primary text-black/90">+
                                        Data
                                        Pendidikan</a>
                                    <a href="{{ route('detailDataPendidikan', $alumni->id_alumni) }}"
                                        class="block px-6 py-2 rounded-lg text-white bg-blue-500 active:bg-black active:text-white border">lihat
                                        selengkapnya</a>
                                </div>
                            </div>
                        @else
                            <ul class="steps steps-vertical px-5 md:px-10 lg:px-28 mt-5 md:mt-0 lg:pt-20 h-full   ">
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
                                <div class="flex space-x-5 justify-center">
                                    <button
                                        class=" rounded-lg bg-transparent border border-primary hover:bg-black hover:border-transparent  capitalize">
                                        <a href="{{ route('tambahDataPekerjaan') }}"
                                            class="block px-5 py-2 text-black/70 hover:text-white">
                                            +
                                            data
                                            pekerjaan
                                        </a>
                                    </button>
                                    <button
                                        class=" rounded-lg bg-transparent border border-primary hover:bg-black hover:border-transparent capitalize">
                                        <a href="{{ route('tambahDataPendidikan') }}"
                                            class="px-5 py-2 block text-black/70 hover:text-white ">
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
                            class="steps steps-vertical px-5 -mt-[100px] md:mt-0 lg:mt-10 lg:px-28 min-h-[200px] max-h-[500px] lg:min-h-[300px] lg:max-h-[700px] bg-red-600 ">
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



        @if ()
        {{-- ketika data pribadi dan data pekerjaan kosisng --}}
            <div>
                @include('template.utils.footer')
            </div>
            
            {{-- letika data pribadi ada dan data pekerjaan kosong --}}
            @elseif ()
            <div>
                @include('template.utils.footer')
            </div>     
            
            @elseif ()
            {{-- ketika data pribadi ada dan data pekerjaan ada --}}
            <div>
                @include('template.utils.footer')
            </div>     

        @endif

    </body>

    </html>
@endsection
