@extends('template.master')
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.2/dist/full.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>
@section('content')
    {{-- @dd($alumni) --}}

    <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-20 -left-32 z-0"></div>
    <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-80 -right-52 z-0"></div>
    <main>
        <!--?  navigasi ==========-->
        @include('template.utils.navbar')
        <!--!  navigasi ==========-->

        <section class="grid grid-cols-2 ">
            <div class="w-full min-h-[80vh] justify-center items-start pt-5 flex">
                <div class="flex flex-col space-y-5 justify-center items-center">
                    {{-- <div class="bg-red-500 rounded-full w-[200px] h-[200px]"></div> --}}
                    <img src="{{ asset('assets/random/' . $dataPribadi->user->profil_picture) }}" alt=""
                        srcset="" class="rounded-full w-[200px] h-[200px]">

                    <div>
                        <h1 class="text-[35px] font-semibold pb-4 text-black">{{ $dataPribadi->user->name }}</h1>
                        <p class="text-[15px] -mt-4 mb-5 text-black/50 font-light">
                            {{ $dataPribadi->user->bio ?? 'Belum memiliki bio' }}
                        </p>
                        <table class="w-full text-black/70">
                            <tr class="divide-y">
                                <td>NISN</td>
                                <td class="py-2 px-6">:</td>
                                <td>{{ $dataPribadi->nisn }}</td>
                            </tr>
                            <!-- jenis_kelamin -->
                            <tr class="divide-y">
                                <td>Jenis Kelamin</td>
                                <td class="py-2 px-6">:</td>
                                <td>{{ $dataPribadi->jenis_kelamin }}</td>
                            </tr>
                            <!-- agama -->
                            <tr class="divide-y">
                                <td>Agama</td>
                                <td class="py-2 px-6">:</td>
                                <td>{{ $dataPribadi->agama }}</td>
                            </tr>
                            <!-- tgl lair -->
                            <tr class="divide-y">
                                <td>Tempat Lahir</td>
                                <td class="py-2 px-6">:</td>
                                <td>{{ $dataPribadi->tempat_lahir }}</td>
                            </tr>
                            <tr class="divide-y">
                                <td>Tangal Lahir</td>
                                <td class="py-2 px-6">:</td>
                                <td>{{ $dataPribadi->tanggal_lahir ?? '-' }}</td>
                            </tr>

                            <tr class="divide-y">
                                <td>Jurusan</td>
                                <td class="py-2 px-6">:</td>
                                <td>{{ $dataPribadi->jurusan }}
                                </td>
                            </tr>

                            <tr class="divide-y">
                                <td>Tamatan</td>
                                <td class="py-2 px-6">:</td>
                                <td>{{ $dataPribadi->tamatan }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="w-full min-h-[80vh] ">
                <div class="w-full min-h-[40vh]">
                    @if ($dataPekerjaan->count() > 0)
                        <ul class="steps steps-vertical">
                            @foreach ($dataPekerjaan->take(3) as $item)
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
                        {{-- @dd($dataPribadi) --}}
                        <a href="{{ route('moreDataPekerjaan', $dataPribadi->id_alumni) }}" class="underline">view
                            more</a>
                    @else
                        <h1 class="text-blue-700 bg-slate-950">Tidak Ada Data</h1>
                    @endif
                </div>
                <div class="w-full min-h-[40vh] ">
                    @if ($dataPendidikan->count() > 0)
                        {{-- <table> --}}
                        <ul class="steps steps-vertical">
                            @foreach ($dataPendidikan->take(3) as $item)
                                <li class="step step-primary">
                                    <div class="flex justify-start items-start flex-col">
                                        <h1 class="text-black/90 capitalize text-[20px]">
                                            {{ $item->nama_univ }}
                                        </h1>
                                        <p>{{ $item->fakultas }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('moreDataPendidikan', $dataPribadi->id_alumni) }}" class="underline">
                            view more</a>
                    @else
                        <h1 class="text-blue-700 bg-slate-950">Tidak Ada Data</h1>
                    @endif
                </div>
            </div>
        </section>
    </main>

    <!-- ?footer -->
    @include('template.utils.footer')
    <!-- !footer -->
@endsection
