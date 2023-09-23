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
                    <form action="{{ route('simpanDataPekerjaan', Auth::user()->id_user) }}" method="POST">
                        @csrf
                        <div class="">
                            <label for="">Nama Pekerjaan</label>
                            <input type="text" name="nama_pekerjaan">
                        </div>
                        <div class="">
                            <label for="">Nama Instansi</label>
                            <input type="text" name="nama_instansi">
                        </div>
                        <div class="">
                            <label for="">Alamat Instansi</label>
                            <input type="text" name="alm_instansi">
                        </div>
                        <div class="">
                            <label for="">Jabatan</label>
                            <input type="text" name="jbt">
                        </div>
                        <button type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
