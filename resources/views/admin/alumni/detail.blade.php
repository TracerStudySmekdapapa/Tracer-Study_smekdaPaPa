<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

@extends('template.admin.master')

@section('konten')
    <section class="bg-white grid  grid-col-2 md:grid-cols-12 px-[30px] box-border py-5 min-h-[1000px]">
        <div class="md:col-span-2 relative hidden md:block">
            @include('template.admin.sidebar')
        </div>
        <div class="md:col-span-10 md:mr-10">
            <section class="grid grid-cols-1 md:grid-cols-2 gap-x-4 capitalize mt-10 ">
                <div class="w-full min-h-[500px]  justify-center items-start pt-5 flex">
                    <div class="flex flex-col space-y-5 justify-start items-center">

                        {{-- ! data pribadi seperti nama bio dan email --}}
                        <div class="rounded-full w-[200px] h-[200px] overflow-hidden border-2 border-black">
                            <img src="{{ asset('assets/random/' . $dataPribadi->user->profil_picture) }}" alt="gambar"
                                class="w-full h-full object-cover " />
                        </div>
                        <div class="text-[#252525] mx-1 mb-6 ">
                            <h1
                                class=" text-[20px] text-center  sm:text-[25px] lg:text-[30px] font-semibold pb-4 capitalize">
                                {{ $dataPribadi->user->name }}</h1>
                            <p
                                class="text-[13px] -mt-4 mb-5 text-black/60 font-light lg:pr-10 text-center lg:text-left max-w-[350px] min-w-[350px]">
                                {{ $dataPribadi->user->bio ?? 'Belum Ada Bio' }}
                            </p>
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
                            <div class="w-full  justify-end flex ">


                                <button
                                    class=" w-[80%] mx-auto mt-5 rounded-lg bg-transparent border border-primary hover:bg-black hover:border-transparent hover:text-white capitalize">
                                    <a href="{{ route('editAlumniPribadi', $dataPribadi->id_pribadi) }}"
                                        class="block px-5 py-2 text-sm">
                                        edit Data Pribadi
                                    </a>
                                </button>


                            </div>


                        </div>
                    </div>
                </div>



                <div class="w-full grid grid-cols-1 gap-y-5">

                    <div
                        class="w-full   min-h-[100px]  max-h-[500px]  mt-10  bg-white shadow-md rounded-[5px] p-8 overflow-y-auto">
                        <div class="flex flex-col space-y-4">

                            <div class=" grid grid-cols-3 text-center w-full   gap-5 pb-5">
                                <div class="col-span-2">
                                    <p class="text-[14px] font-medium text-[#252525]/80 ">Pekerjaan & instansi</p>
                                </div>
                                <div class="col-span-1">
                                    <p class="text-[14px] font-medium text-[#252525]/80">Aksi</p>
                                </div>
                            </div>


                            @forelse ($dataPekerjaan as  $index => $item)
                                <div class=" grid grid-cols-3 place-items-center w-full   gap-5">
                                    <div class="col-span-2 text-left w-full">
                                        <p class="font-semibold capitalize text-[#252525]">{{ $item->nama_pekerjaan }}</p>
                                        <p class="text-primary text-[12px] font-light  -mt-0.5 uppercase">
                                            {{ $item->nama_instansi }}
                                        </p>
                                    </div>
                                    <div class="w-full col-span-1">
                                        <a href="{{ route('editAlumniPekerjaan', [$dataPribadi->id_pribadi, $item->id_pekerjaan]) }}"
                                            class="block text-center">
                                            <img src="{{ asset('assets/aksi-edit.svg') }}" alt="edit"
                                                class="block mx-auto">
                                        </a>
                                    </div>
                                </div>

                                @if (!$loop->last)
                                    <hr class="w-[100%] mx-auto h-[1.5px] bg-[#252525]/10 ">
                                @endif
                            @empty
                                <h1>TIdak ada data</h1>
                            @endforelse




                        </div>

                    </div>
                    <div class="w-full   min-h-[100px]  max-h-[500px]   mt-10  bg-white shadow-md rounded-[5px] p-8">
                        <div class="flex flex-col space-y-4">

                            <div class=" grid grid-cols-3 text-center w-full   gap-5 pb-5">
                                <div class="col-span-2">
                                    <p class="text-[14px] font-medium text-[#252525]/80 ">Universitas</p>
                                </div>
                                <div class="col-span-1">
                                    <p class="text-[14px] font-medium text-[#252525]/80">Aksi</p>
                                </div>
                            </div>

                            @forelse ($dataPendidikan as $index => $item)
                                <div class=" grid grid-cols-3 place-items-center w-full   gap-5">
                                    <div class="text-left w-full col-span-2">
                                        <p class="font-semibold capitalize text-[#252525]">{{ $item->nama_univ }}</p>
                                        <p class="text-primary text-[12px] font-light  -mt-0.5 uppercase">
                                            {{ $item->fakultas }}
                                        </p>
                                    </div>
                                    <div class="w-full col-span-1">
                                        <a href="{{ route('editAlumniPendidikan', [$dataPribadi->id_pribadi, $item->id_pendidikan]) }}"
                                            class="block text-center">
                                            <img src="{{ asset('assets/aksi-edit.svg') }}" alt="edit"
                                                class="block mx-auto">
                                        </a>
                                    </div>
                                </div>
                                @if (!$loop->last)
                                    <hr class="w-[100%] mx-auto h-[1.5px] bg-[#252525]/10 ">
                                @endif
                            @empty
                                <h1>TIdak ada data</h1>
                            @endforelse



                        </div>

                    </div>
                </div>

            </section>

        </div>


    </section>
@endsection
