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
                    <table class="table-fixed w-full text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Jurusan</th>
                                <th>Aksi</th>
                                <th>Angkatan</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($alumni as $data)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $data->user->name }}</td>
                                    <td>{{ $data->nisn ?? '-' }}</td>
                                    <td>{{ $data->jurusan ?? '-' }}</td>
                                    <td>{{ $data->angkatan ?? '-' }}</td>
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
</x-app-layout>
