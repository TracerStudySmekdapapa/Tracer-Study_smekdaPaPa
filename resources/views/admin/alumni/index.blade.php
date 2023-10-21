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
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    <h1>Data Alumni</h1>
                                    <div class="">
                                        <form id="searchForm" action="{{ route('dataAlumni') }}" method="get">
                                            <label for="">Search</label>
                                            <input type="text" name="search" value="{{ $name }}">

                                            <label for="">Angkatan</label>
                                            <select name="angkatan" id="">
                                                <option value="">Semuanya</option>
                                                @for ($tahun = 2021; $tahun <= 2024; $tahun++)
                                                    <option value="{{ $tahun }}"
                                                        {{ $angkatan == $tahun ? 'selected' : '' }}>
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
                                                @php
                                                    $user = Auth::user();
                                                    $user->alumni->first();
                                                @endphp
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $data->name }}</td>
                                                    <td>{{ $data->nisn ?? '-' }}</td>
                                                    <td>{{ $data->jurusan ?? '-' }}</td>
                                                    <td>{{ $data->angkatan ?? '-' }}</td>
                                                    <td>
                                                        @if (Auth::user()->hasRole('Admin'))
                                                            <a
                                                                href="{{ route('adminDetailAlumni', $data->id_pribadi) }}">detail</a>
                                                        @else
                                                            <a
                                                                href="{{ route('adminDetailAlumni', $data->id_pribadi) }}">detail</a>
                                                        @endif
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

                    {{-- ! ==========Cards total --}}



                </div>
            </main>
        </div>
    </div>
@endsection
