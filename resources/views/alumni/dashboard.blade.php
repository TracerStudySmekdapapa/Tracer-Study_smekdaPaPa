@extends('template.master')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.2/dist/full.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>
@section('content')
    @if (session('message'))
        <div class="absolute top-0 right-0 p-4">
            <h1 class="px-4 py-2.5 bg-green-600 font-bold uppercase rounded-md text-white">
                {{ session('message') }}
            </h1>
        </div>
    @endif
    <!--link font -->
    <div class="w-[130px] h-[130px] bg-primary hidden  blur-[100px] absolute top-20 -left-32 z-0 lg:block"></div>
    <main>
        @include('template.utils.navbar')

        <section class="grid grid-cols-1 md:grid-cols-2 gap-x-4 capitalize mt-10 ">
            <div class="w-full min-h-[500px]  justify-center items-start pt-5 flex">
                <div class="flex flex-col space-y-5 justify-start items-center">

                    {{-- ! data pribadi seperti nama bio dan email --}}
                    <div class="rounded-full w-[200px] h-[200px] overflow-hidden border-2 border-black">
                        <img src="{{ asset('assets/random/' . Auth::user()->profil_picture) }}" alt="gambar"
                            class="w-full h-full object-cover " />
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
                                    <td>{{ $alumni->jurusan->nama_jurusan ?? '-' }}</td>
                                </tr>

                                <tr class="divide-y">
                                    <td>tamatan</td>
                                    <td class="py-2 px-6">:</td>
                                    <td>{{ $alumni->tamatan ?? '-' }}</td>
                                </tr>
                            </table>
                            <div class="w-full  justify-end flex ">


                                <button
                                    class=" w-[80%] mx-auto mt-5 rounded-lg bg-transparent border border-primary hover:bg-black hover:border-transparent hover:text-white capitalize">
                                    <a href="{{ route('editDataPribadi', $data) }}" class="block px-5 py-2 text-sm">
                                        edit Data Pribadi
                                    </a>
                                </button>


                            </div>
                            {{-- ! jika tidak ada data pribadi --}}
                        @else
                            <table class="w-full text-black/70 -mt-2">
                                <tr class="">
                                    <td class="hidden lg:inline ">email</td>
                                    <td class="py-2 px-6 hidden lg:inline">:</td>
                                    <td class="text-center lg:text-left lowercase">{{ Auth::user()->email }}</td>
                                </tr>
                            </table>
                            <div class="w-full  justify-end flex ">
                                <button
                                    class="w-[80%] mx-auto  text-sm mt-5 rounded-lg bg-transparent border border-primary hover:bg-black hover:border-transparent hover:text-white capitalize text-black/70">
                                    <a href="{{ route('tambahDataPribadi') }}" class="block px-5 py-1 md:py-2 text-sm">
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
                                            <div class="flex justify-start items-start flex-col">
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
                                class="flex mx-2 space-y-5 md:space-y-0 flex-col md:flex-row md:space-x-5 items-center justify-center lg:ml-32 ">
                                <a href="{{ route('tambahDataPekerjaan') }}"
                                    class="rounded-lg w-full mx-auto  py-2 border block text-center border-primary text-black/90 text-sm">+
                                    Data
                                    Pekerjaan</a>
                                <a href="{{ route('detailDataPekerjaan', $alumni->id_pribadi) }}"
                                    class="block w-full text-center mx-auto py-2 rounded-lg text-white bg-primary active:bg-black active:text-white border text-sm">lihat
                                    selengkapnya</a>
                            </div>


                            <hr class="my-5">

                            <!-- data pendidikan-->
                            <div class="w-full min-h-[300px] flex justify-stretch lg:px-20 md:px-5">
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
                            <div
                                class="flex mx-2 space-y-5 md:space-y-0 flex-col md:flex-row md:space-x-5 items-center justify-center lg:ml-32 ">
                                <a href="{{ route('tambahDataPendidikan') }}"
                                    class="rounded-lg w-full mx-auto py-2 border block text-center border-primary text-black/90 text-sm">+
                                    Data
                                    Pendidikan</a>
                                <a href="{{ route('detailDataPendidikan', $alumni->id_pribadi) }}"
                                    class="block w-full mx-auto text-center py-2 rounded-lg text-white bg-primary active:bg-black active:text-white border text-sm">lihat
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
                            <div class="flex mt-5 space-x-5 justify-center">
                                <button
                                    class=" rounded-lg bg-transparent border border-primary hover:bg-black hover:border-transparent  capitalize">
                                    <a href="{{ route('tambahDataPekerjaan') }}"
                                        class="block px-5 py-2 text-black/70 hover:text-white text-sm">
                                        +
                                        data
                                        pekerjaan
                                    </a>
                                </button>
                                <button
                                    class=" rounded-lg bg-transparent border border-primary hover:bg-black hover:border-transparent capitalize">
                                    <a href="{{ route('tambahDataPendidikan') }}"
                                        class="px-5 py-2 block text-black/70 hover:text-white text-sm ">
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
