{{-- @dd($alumni[1]->pekerjaan) --}}

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
                    @endif
                    <div class="">
                        <h1>Data Alumni</h1>
                        <table class="table-fixed w-full text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>NISN</th>
                                    <th>Jurusan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alumni as $data)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $data->user->name }}</td>
                                        <td>{{ $data->user->email }}</td>
                                        <td>{{ $data->nisn ?? '-' }}</td>
                                        <td>{{ $data->jurusan ?? '-' }}</td>
                                        <td>
                                            <a href="{{ route('detailAlumni', $data->id_alumni) }}">detail</a>
                                            <button type="submit">delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
