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
    <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-80 -right-52 z-0 hidden lg:block"></div>
    <main class="">
        @include('template.utils.navbar')

        <section class="grid grid-cols-1 md:grid-cols-2 gap-x-4 capitalize ">
            <div class="w-full min-h-[500px]  justify-center items-start pt-5 flex">
                <div class="flex flex-col space-y-5 justify-start items-center">
                    <div class="rounded-full w-[200px] h-[200px] overflow-hidden border-2 border-black">
                        <img src="{{ asset('assets/random/' . $dataPribadi->user->profil_picture) }}" alt="gambar"
                            class="w-full h-full object-cover " />
                    </div>

                    <div class="text-[#252525] mx-1 mb-6">
                        <h1 class=" text-[20px] text-center  sm:text-[25px] lg:text-[30px] font-semibold pb-4 capitalize">
                            {{ $dataPribadi->user->name }}</h1>
                        <p
                            class="text-[13px] -mt-4 mb-5 text-black/60 font-light lg:pr-10 text-center lg:text-left max-w-[350px] min-w-[350px]">
                            {{ $dataPribadi->user->bio ?? 'Belum memiliki bio' }}</p>
                        <table class="md:w-full text-black/80 w-[80%] sm:w-[90%]  mx-auto ">
                            <tr class="divide-y">
                                <td>nisn</td>
                                <td class="py-2 px-6">:</td>
                                <td>{{ $dataPribadi->nisn ?? '-' }}</td>
                            </tr>
                            <!-- jenis_kelamin -->
                            <tr class="divide-y">
                                <td>jenis kelamin</td>
                                <td class="py-2 px-6">:</td>
                                <td>{{ $dataPribadi->jenis_kelamin ?? '-' }}</td>
                            </tr>
                            <!-- agama -->
                            <tr class="divide-y">
                                <td>agama</td>
                                <td class="py-2 px-6">:</td>
                                <td>{{ $dataPribadi->agama ?? '-' }}</td>
                            </tr>
                            <!-- tgl lair -->
                            <tr class="divide-y">
                                <td>tempat lahir</td>
                                <td class="py-2 px-6">:</td>
                                <td>{{ $dataPribadi->tempat_lahir ?? '-' }}</td>
                            </tr>
                            <tr class="divide-y">
                                <td>tangal lahir</td>
                                <td class="py-2 px-6">:</td>
                                <td>{{ $dataPribadi->tanggal_lahir ? Carbon\Carbon::parse($dataPribadi->tanggal_lahir)->isoFormat('dddd, D MMMM Y') : '-' }}
                                </td>
                            </tr>

                            <tr class="divide-y">
                                <td>jurusan</td>
                                <td class="py-2 px-6">:</td>
                                <td>{{ $dataPribadi->jurusan->nama_jurusan ?? '-' }}</td>
                            </tr>

                            <tr class="divide-y">
                                <td>tamatan</td>
                                <td class="py-2 px-6">:</td>
                                <td>{{ $dataPribadi->tamatan ?? '-' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>


            <div class="w-full   min-h-[400px] max-h-[500px]   ">
                <div class="w-full min-h-[100px] mt-14  block">
                    @if ($dataPekerjaan->count() > 0)
                        <div class="w-full min-h-[300px] max-h-[400px] flex justify-stretch  lg:px-20  ">
                            <ul class="steps steps-vertical h-[300px]">
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
                        </div>
                        <div class="flex space-x-5 items-center justify-center lg:justify-start lg:ml-32 ">

                            <a href="{{ route('moreDataPekerjaan', $dataPribadi->id_pribadi) }}"
                                class="block px-6 py-2 rounded-lg text-white bg-primary active:bg-black active:text-white border text-sm">lihat
                                selengkapnya</a>
                        </div>
                    @else
                        <h1 class="text-blacl/50">Tidak Ada Data</h1>
                    @endif
                </div>


                <hr class="my-5 mx-5">

                <div class="w-full min-h-[100px] mt-14  block">
                    @if ($dataPendidikan->count() > 0)
                        <div class="w-full min-h-[300px] max-h-[400px] flex justify-stretch lg:px-20  ">
                            <ul class="steps steps-vertical h-[300px]">
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
                        </div>
                        <div class="flex space-x-5 items-center justify-center lg:justify-start lg:ml-32 ">

                            <a href="{{ route('moreDataPendidikan', $dataPribadi->id_pribadi) }}"
                                class="block px-6 py-2 rounded-lg text-white bg-primary active:bg-black active:text-white border text-sm">lihat
                                selengkapnya</a>
                        </div>
                    @else
                        <h1 class="text-black/50 ">Tidak Ada Data</h1>
                    @endif
                </div>

            </div>
        </section>
    </main>

    <!-- ?footer -->
    <div class="mt-[20rem] md:mt-72 lg:mt-40">
        @include('template.utils.footer')
    </div>
    <!-- !footer -->
@endsection
