<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('updateDataPribadi', Auth::user()->id_user) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="">
                            <label for="">Nisn</label>
                            <input type="text" name="nisn" value="{{ old('nisn', $data->nisn) }}">
                        </div>
                        <div class="">
                            <label for="">No Telp</label>
                            <input type="text" name="no_telp" value="{{ $data->no_telp }}">
                        </div>
                        <div class="">
                            <label for="">Tempat Lahir</label>
                            <input type="text" name="tmp_lahir" value="{{ $data->tempat_lahir }}">
                        </div>
                        <div class="">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" value="{{ $data->tanggal_lahir }}">
                        </div>
                        <div class="">
                            <label for="">Agama</label>
                            <input type="text" name="agm" value="{{ $data->agama }}">
                        </div>
                        <div class="">
                            <label for="">Laki-Laki</label>
                            <input type="radio" value="Laki-Laki" name="kelamin"
                                {{ $data->jenis_kelamin == 'Laki-Laki' ? 'checked' : '' }}>
                            <label for="">Perempuan</label>
                            <input type="radio" value="Perempuan" name="kelamin"
                                {{ $data->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
                        </div>
                        <div class="">
                            <label for="">Jurusan</label>
                            <input type="text" name="jrsn" value="{{ $data->jurusan }}">
                        </div>
                        <div class="">
                            <label for="">Angkatan</label>
                            <select name="angkatan" id="">
                                @for ($tahun = 2000; $tahun <= 2050; $tahun++)
                                    <option name="angkatan" value="{{ $tahun }}"
                                        {{ $data->angkatan == $tahun ? 'selected' : '' }}>{{ $tahun }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="">
                            <label for="">Foto Profi</label>
                            <input type="file" name="profil">
                        </div>

                        <button type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
