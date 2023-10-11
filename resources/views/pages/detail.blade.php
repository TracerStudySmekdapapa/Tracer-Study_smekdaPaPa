@extends('template.master')
@section('content')
    <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-20 -left-32 z-0"></div>
    <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-80 -right-52 z-0"></div>
    <main>
        <!--?  navigasi ==========-->
        @include('template.utils.navbar')
        <!--!  navigasi ==========-->

        <section class="grid grid-cols-2">
            <div class="w-full min-h-[80vh] justify-center items-start pt-5 flex">
                <div class="flex flex-col space-y-5 justify-center items-center">
                    <div class="bg-red-500 rounded-full w-[200px] h-[200px]"></div>
                    <div>
                        <h1 class="text-[35px] font-semibold pb-4">{{ $dataPribadi->user->name }}</h1>
                        <p class="text-[15px] -mt-4 mb-5 text-black/50 font-light">
                            {{ $dataPribadi->user->bio ?? 'Belum memiliki bio' }}
                        </p>
                        <table class="w-full">
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
                                <td>{{ $dataPribadi->jurusan === 'RPL' ? 'Rekayasa Perangkat Lunak' : '' }}
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
            <div class="w-full min-h-[80vh] bg-teal-500">
                <div class="w-full min-h-[40vh] bg-violet-500">
                    <table>
                        @foreach ($dataPekerjaan as $item)
                            <tr>
                                <td>{{ $item->nama_pekerjaan }}</td>
                                <td>:</td>
                                <td>{{ $item->nama_instansi ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </table>
                    <button class="underline">view more</button>
                </div>
                <div class="w-full min-h-[40vh] bg-orange-500">
                    <table>
                        @foreach ($dataPendidikan as $item)
                            <tr>
                                <td>{{ $item->nama_univ }}</td>
                                <td>:</td>
                                <td>{{ $item->fakultas ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </table>
                    <button class="underline">view more</button>
                </div>
            </div>
        </section>
    </main>

    <!-- ?footer -->
    @include('template.utils.footer')
    <!-- !footer -->
@endsection
