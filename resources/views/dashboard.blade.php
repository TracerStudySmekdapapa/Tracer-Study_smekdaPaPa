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
                    @if ($message = Session::get('message'))
                        <h1>{{ $message }}</h1>
                    @endif

                    @if (Auth::user()->hasRole('Alumni'))
                        <a href="{{ route('tambahDataPribadi', Auth::user()->id_user) }}"
                            class="px-2 py-1 rounded-full bg-red-700 text-white">Tambah Data
                            Pribadi Alumni</a>
                        <a href="{{ route('tambahDataPekerjaan') }}"
                            class="px-2 py-1 rounded-full bg-red-700 text-white">Tambah Data
                            Pekerjaan Alumni</a>
                        <a href="{{ route('tambahDataPekerjaan') }}"
                            class="px-2 py-1 rounded-full bg-red-700 text-white">Tambah Data
                            Pendidikan Alumni</a>
                        <div class="">
                            <h1>Data Alumni</h1>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
