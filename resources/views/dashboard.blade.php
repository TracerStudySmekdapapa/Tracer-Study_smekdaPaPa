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

                    @if (!Auth::user()->hasRole('Admin') && !Auth::user()->hasRole('Alumni'))
                        @if (!$cekAlumni)
                            <h1>Silahkan tambahkan data alumni</h1>
                            <p>Harap tunggu proses untuk memverifikasi data pribadi Anda</p>
                            <a href="{{ route('tambahDataPribadi') }}"
                                class="px-2 py-1 rounded-full bg-red-700 text-white">Tambah Data
                                Pribadi</a>
                        @else
                            <p>Harap tunggu proses untuk memverifikasi data pribadi Anda</p>
                            <a href="{{ route('editDataPribadi', Auth::user()->id_user) }}"
                                class="px-2 py-1 rounded-full bg-red-700 text-white">Edit Data
                                Pribadi</a>
                        @endif
                    @endif
                    @if (Auth::user()->hasRole('Alumni'))
                        <a href="{{ route('editDataPribadi', Auth::user()->id_user) }}"
                            class="px-2 py-1 rounded-full bg-red-700 text-white">Edit Data
                            Pribadi</a>
                        <a href="{{ route('tambahDataPekerjaan') }}"
                            class="px-2 py-1 rounded-full bg-red-700 text-white">Tambah Data
                            Pekerjaan Alumni</a>
                        <a href="{{ route('tambahDataPendidikan') }}"
                            class="px-2 py-1 rounded-full bg-red-700 text-white">Tambah Data
                            Pendidikan Alumni</a>
                    @endif
                    <div class="">
                        <h1>Data Alumni</h1>
                        <div class="">
                            <form action="{{ route('dashboard') }}" method="get">
                                <label for="">Search</label>
                                <input type="text" name="name" value="{{ $name }}">
                            </form>
                        </div>
                        <table class="table-fixed w-full text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Jurusan</th>
                                    <th>Angkatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($results ?? $alumni as $data)
                                    @php
                                        $user = Auth::user();
                                        $user->alumni->first();
                                    @endphp
                                    <tr class="{{ $user->id_user == $data->id_user ? 'bg-gray-200' : '' }}">
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->nisn ?? '-' }}</td>
                                        <td>{{ $data->jurusan ?? '-' }}</td>
                                        <td>{{ $data->angkatan ?? '-' }}</td>
                                        <td>
                                            @if (Auth::user()->hasRole('Admin'))
                                                <a href="{{ route('adminDetailAlumni', $data->id_alumni) }}">detail</a>
                                            @else
                                                <a href="{{ route('detailAlumni', $data->id_alumni) }}">detail</a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    @if ($name)
                                        <p class="text-danger small text-center">DATA TIDAK DITEMUKAN!</p>
                                    @endif
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
