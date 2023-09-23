</html>

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
                    <form action="{{ route('simpanDataPribadi', Auth::user()->id_user) }}" method="POST">
                        @csrf
                        <div class="">
                            <label for="">Nisn</label>
                            <input type="text" name="nisn">
                        </div>
                        <div class="">
                            <label for="">No Telp</label>
                            <input type="text" name="no_telp">
                        </div>
                        <div class="">
                            <label for="">Tempat/tgllahir</label>
                            <input type="text" name="tmp_lahir">
                        </div>
                        <div class="">
                            <label for="">Agama</label>
                            <input type="text" name="agm">
                        </div>
                        <div class="">
                            <label for="">Laki-Laki</label>
                            <input type="radio" value="Laki-Laki" name="kelamin">
                        </div>
                        <div class="">
                            <label for="">Jurusan</label>
                            <input type="text" name="jrsn">
                        </div>
                        <div class="">
                            <label for="">Foto Profil</label>
                            <input type="file" name="profil">
                        </div>

                        <button type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
