<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

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
                        <input type="text" name="nisn" value="{{ Auth::user()->name }}">
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
                        <input type="radio" value="Laki-Laki" name="kelamin"
                            {{ $dataPribadi->jenis_kelamin == 'Laki-Laki' ? 'checked' : '' }}>
                        <label for="">Perempuan</label>
                        <input type="radio" value="Perempuan" name="kelamin"
                            {{ $dataPribadi->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
                    </div>
                    <div class="">
                        <label for="">Jurusan</label>
                        <input type="text" name="jrsn" value="{{ $dataPribadi->jurusan }}">
                    </div>
                </div>
                <div class="p-6 bg-white  mt-4 text-gray-900">
                    <div class="">
                        <label for="">Nama Pekerjaan :</label>
                        @if ($dataPekerjaan->get()->count() > 1)
                            {{-- Looping data pekerjaan alumni yang ada dua --}}
                            @for ($i = 0; $i < $dataPekerjaan->get()->count(); $i++)
                                <p>{{ $dataPekerjaan->get()[$i]->nama_pekerjaan }}</p>
                                {{-- <p>{{ $dataPekerjaan->get()[$i]->jabatan }}</p> --}}
                            @endfor
                        @else
                            {{ $dataPekerjaan->first()->nama_pekerjaan ?? '-' }}
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
