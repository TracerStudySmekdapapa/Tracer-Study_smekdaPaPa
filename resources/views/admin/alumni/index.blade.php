<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Data Alumni</h1>
                    <div class="">
                        <form id="searchForm" action="{{ route('dataAlumni') }}" method="get">
                            <label for="">Search</label>
                            <input type="text" name="name" value="{{ $name }}">

                            <label for="">Angkatan</label>
                            <select name="angkatan" id="">
                                <option value="">Semuanya</option>
                                @for ($tahun = 2021; $tahun <= 2024; $tahun++)
                                    <option value="{{ $tahun }}" {{ $angkatan == $tahun ? 'selected' : '' }}>
                                        {{ $tahun }}</option>
                                @endfor
                            </select>
                            <button type="submit">Cari</button>
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
                                {{-- @dd(
                                        ) --}}
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
                                        <a href="{{ route('detailAlumni', $data->id_alumni) }}">detail</a>
                                        <button type="submit">delete</button>
                                    </td>
                                </tr>
                            @empty
                                @if ($name ?? $angkatan)
                                    <p class="text-danger small text-center">DATA TIDAK DITEMUKAN!</p>
                                @endif
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
