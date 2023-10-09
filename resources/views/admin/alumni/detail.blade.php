@extends('template.admin.master')

@section('konten')
    <div class="flex h-screen bg-gray-0 dark:bg-gray-900 " :class="{ 'overflow-hidden': isSideMenuOpen }">



        {{-- ? sidebar --}}
        @include('template.admin.sidebar')
        {{-- end sidebar --}}


        <div class="flex flex-col flex-1 w-full">

            {{-- ? ===================header --}}
            @include('template.admin.header')
            {{-- ! =================== end header --}}




            <main class="h-full  " style="padding: 0 0;">
                <div class="container px-6 mx-auto grid">

                    {{-- ? title page --}}
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Dashboard
                    </h2>
                    {{-- ! end title --}}

                    {{-- ? ==========table  --}}
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 bg-white  text-gray-900">
                                    <div class="">
                                        <label for="">Foto Profil</label>
                                        <img src="" alt="harusnya PP">
                                    </div>
                                    <div class="">
                                        <label for="">Nama</label>
                                        <input type="text" name="nisn" value="{{ $dataPribadi->user->name }}">
                                    </div>
                                    <div class="">
                                        <label for="">Nisn</label>
                                        <input type="text" name="nisn" value="{{ $dataPribadi->nisn }}">
                                    </div>
                                    <div class="">
                                        <label for="">No Telp</label>
                                        <input type="text" name="no_telp" value="{{ $dataPribadi->no_telp }}">
                                    </div>
                                    <div class="">
                                        <label for="">Tempat/tgllahir</label>
                                        <input type="text" name="tmp_lahir" value="{{ $dataPribadi->tempat_lahir }}">
                                    </div>
                                    <div class="">
                                        <label for="">Agama</label>
                                        <input type="text" name="agm" value="{{ $dataPribadi->agama }}">
                                    </div>
                                    <div class="">
                                        <label for="">Laki-Laki</label>
                                        <input disabled type="radio" value="Laki-Laki" name="kelamin"
                                            {{ $dataPribadi->jenis_kelamin == 'Laki-Laki' ? 'checked' : '' }}>
                                        <label for="">Perempuan</label>
                                        <input disabled type="radio" value="Perempuan" name="kelamin"
                                            {{ $dataPribadi->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
                                    </div>
                                    <div class="">
                                        <label for="">Jurusan</label>
                                        <input type="text" name="jrsn" value="{{ $dataPribadi->jurusan }}">
                                    </div>
                                    <!--variabel angkatan sebenarnya tamatan-->
                                    <div class="">
                                        <label for="">Tamatan</label>
                                        <input type="text" name="angkatan" value="{{ $dataPribadi->angkatan }}">
                                    </div>
                                </div>
                                <!-- start Data pekerjaan -->
                                <div class="p-6 bg-white  mt-4 text-gray-900">
                                    <p>Data Pekerjaan</p>
                                    <div class="flex space-x-2">
                                        <label for="">Nama Pekerjaan :</label>
                                        @if ($dataPekerjaan->count() > 1)
                                            {{-- Looping data pekerjaan alumni yang ada dua --}}
                                            @foreach ($dataPekerjaan as $pekerjaan)
                                                <p>{{ $pekerjaan->nama_pekerjaan }}</p>
                                            @endforeach
                                        @else
                                            {{ $dataPekerjaan->first()->nama_pekerjaan ?? '-' }}
                                        @endif
                                    </div>
                                    <div class="flex space-x-2">
                                        <label for="">Nama Instansi :</label>
                                        @if ($dataPekerjaan->count() > 1)
                                            @foreach ($dataPekerjaan as $pekerjaan)
                                                <p>{{ $pekerjaan->nama_instansi }}</p>
                                            @endforeach
                                        @else
                                            {{ $dataPekerjaan->first()->nama_instansi ?? '-' }}
                                        @endif
                                    </div>
                                    <div class="flex space-x-2">
                                        <label for="">Alamat Instansi :</label>
                                        @if ($dataPekerjaan->count() > 1)
                                            @foreach ($dataPekerjaan as $pekerjaan)
                                                <p>{{ $pekerjaan->alamat_instansi }}</p>
                                            @endforeach
                                        @else
                                            {{ $dataPekerjaan->first()->alamat_instansi ?? '-' }}
                                        @endif
                                    </div>
                                    <div class="flex space-x-2">
                                        <label for="">Jabatan :</label>
                                        @if ($dataPekerjaan->count() > 1)
                                            @foreach ($dataPekerjaan as $pekerjaan)
                                                <p>{{ $pekerjaan->jabatan }}</p>
                                            @endforeach
                                        @else
                                            {{ $dataPekerjaan->first()->jabatan ?? '-' }}
                                        @endif
                                    </div>

                                </div>
                                <!-- endData pekerjaan -->
                                <!-- start Data Pendidikan -->
                                <div class="p-6 bg-white  mt-4 text-gray-900">
                                    <p>Data Pendidikan</p>
                                    <div class="flex space-x-2">
                                        <label for="">Nama Universitas :</label>
                                        @if ($dataPendidikan->count() > 1)
                                            {{-- Looping data pekerjaan alumni yang ada dua --}}
                                             @foreach ($dataPendidikan as $pendidikan)
                                                <p>{{ $pendidikan->nama_univ }}</p>
                                            @endforeach
                                        @else
                                            {{ $dataPendidikan->first()->nama_univ ?? '-' }}
                                        @endif
                                    </div>
                                    <div class="flex space-x-2">
                                        <label for="">Fakultas :</label>
                                        @if ($dataPendidikan->count() > 1)
                                            @foreach ($dataPendidikan as $pendidikan)
                                                <p>{{ $pendidikan->fakultas }}</p>
                                            @endforeach
                                        @else
                                            {{ $dataPendidikan->first()->fakultas ?? '-' }}
                                        @endif
                                    </div>
                                    <div class="flex space-x-2">
                                        <label for="">Prodi :</label>
                                        @if ($dataPendidikan->count() > 1)
                                            @foreach ($dataPendidikan as $pendidikan)
                                                <p>{{ $pendidikan->prodi }}</p>
                                            @endforeach
                                        @else
                                            {{ $dataPendidikan->first()->prodi ?? '-' }}
                                        @endif
                                    </div>
                                    <div class="flex space-x-2">
                                        <label for="">Alamat Universitas :</label>
                                        @if ($dataPendidikan->count() > 1)
                                            @foreach ($dataPendidikan as $pendidikan)
                                                <p>{{ $pendidikan->alamat_univ }}</p>
                                            @endforeach
                                        @else
                                            {{ $dataPendidikan->first()->alamat_univ ?? '-' }}
                                        @endif
                                    </div>

                                </div>
                                <!-- endData Pendidikan -->

                            </div>
                        </div>
                    </div>

                    {{-- ! ==========Cards total --}}



                </div>
            </main>
        </div>
    </div>
@endsection
