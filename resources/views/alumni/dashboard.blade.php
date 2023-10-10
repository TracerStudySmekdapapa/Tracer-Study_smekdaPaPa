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
        <main class="pb-[70px] md:pb-[120px] lg:pb-[0px]">


            @include('template.utils.navbar')

            <section class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
                <div class="w-full min-h-[500px]  justify-center items-start pt-5 flex">
                    <div class="flex flex-col space-y-5 justify-start items-center">


                        <!-- data pribadi -->
                        <div class="rounded-full w-[200px] h-[200px] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80"
                                alt="gambar" class="w-full h-full object-cover" />
                        </div>
                        <div class="text-[#252525]">
                            {{-- <h1 class="text-[35px] font-semibold pb-4">Syaid Alfarishi</h1> --}}
                            <h1 class="text-[35px] font-semibold pb-4 capitalize">
                                {{ $alumni->user->name ?? Auth::user()->name }}</h1>
                            <p class="text-[13px] -mt-4 mb-5 text-black/50 font-light pr-10 max-w-[350px] min-w-[350px]">
                                {{ Auth::user()->bio ?? 'Belum Ada Bio' }}
                            </p>
                            @if ($alumni)
                                <table class="w-full">
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
                                        class=" mt-5 rounded-lg bg-transparent border border-primary hover:bg-black hover:border-transparent hover:text-white capitalize">
                                        <a href="{{ route('editDataPribadi', $alumni->id_user) }}" class="block px-5 py-2">
                                            edit Data Pribadi
                                        </a>
                                    </button>


                                </div>
                            @else
                                <table class="w-full text-black/60">
                                    <tr class="divide-y">
                                        <td>email</td>
                                        <td>{{ Auth::user()->email }}</td>
                                    </tr>
                                </table>
                                <div class="w-full bg-red justify-end flex ">


                                    <button
                                        class=" mt-5 rounded-lg bg-transparent border border-primary hover:bg-black hover:border-transparent hover:text-white capitalize text-black/70">
                                        <a href="{{ route('tambahDataPribadi') }}" class="block px-5 py-2 ">
                                            + Data Pribadi
                                        </a>
                                    </button>

                                </div>
                            @endif

                        </div>
                    </div>
                </div>



                <!-- belum di verif dan isi data pribadi -->
                <div class="w-full min-h-[400px] max-h-[500px]">
                    {{-- jika alumni ada data pribadi --}}
                    @if ($alumni)
                        @if ($pekerjaan->count() > 0 || $pendidikan->count() > 0)
                            <!-- data lain -->
                            <div class="w-full min-h-[600px] mt-14 ">
                                <!-- data pekerjaan -->
                                <div class="w-full min-h-[300px] flex justify-stretch px-20">
                                    <ul class="steps steps-vertical">
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
                                        class="rounded-full px-10   py-2 border block text-center border-black">+
                                        Data
                                        Pekerjaan</a>
                                    <a href="{{ route('detailDataPekerjaan', $alumni->id_alumni) }}"
                                        class="block px-6 py-2 rounded-full text-white bg-blue-500 active:bg-black active:text-white border">lihat
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
                                        class="rounded-full px-10   py-2 border block text-center border-black">+
                                        Data
                                        Pendidikan</a>
                                    <a href="{{ route('detailDataPendidikan', $alumni->id_alumni) }}"
                                        class="block px-6 py-2 rounded-full text-white bg-blue-500 active:bg-black active:text-white border">lihat
                                        selengkapnya</a>
                                </div>
                            </div>
                        @else
                            <ul class="steps steps-vertical px-28 lg:pt-20 ">
                                <li data-content="✓" class="step step-primary">Register</li>
                                <li data-content="✓" class="step step-primary">login</li>






                                {{-- jika data pribadi ada --}}
                                <li data-content="✓" class="step step-primary">
                                    mengisi data pribadi
                                </li>








                                {{-- if user ini tidak punya role has role --}}
                                @if (Auth::user()->hasRole('Alumni'))
                                    <li data-content="✓" class="step step-primary">
                                        menunggu verivikasi admin untuk melanjutkan
                                    </li>
                                @else
                                    <li data-content="?" class="step step-neutral">
                                        menunggu verivikasi admin untuk melanjutkan
                                    </li>
                                @endif
                                {{-- else --}}

                                {{--  tidak diubah --}}
                                <li data-content="?" class="step step-neutral">
                                    mengisi data pekerjaan
                                </li>
                                <li data-content="?" class="step step-neutral">
                                    mengisi data pendidikan
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
                        <ul class="steps steps-vertical px-28 ">
                            <li data-content="✓" class="step step-primary">Register</li>
                            <li data-content="✓" class="step step-primary">login</li>

                            {{-- jika data pribadi ada --}}
                            <li data-content="?" class="step step-neutral">
                                mengisi data pribadi
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
                                mengisi data pekerjaan
                            </li>
                            <li data-content="?" class="step step-neutral">
                                mengisi data pendidikan
                            </li>
                        </ul>

                    @endif

                </div>
            </section>
        </main>

        <div class="mt-48 md:mt-20 lg:mt-5">
            @include('template.utils.footer')
        </div>

    </body>

    </html>
@endsection
