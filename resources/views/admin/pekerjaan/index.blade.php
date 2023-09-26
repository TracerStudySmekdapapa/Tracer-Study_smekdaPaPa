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
                                <th>Email</th>
                                <th>Jabatan</th>
                                <th>Pekerjaan</th>
                                <th>Instansi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pekerjaan as $data)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $data->alumni->user->name }}</td>
                                    <td>{{ $data->alumni->user->email }}</td>
                                    <td>{{ $data->jabatan }}</td>
                                    <td>{{ $data->nama_pekerjaan }}</td>
                                    <td>{{ $data->nama_instansi }}</td>
                                    <td>


                                        <a href="{{ $data->id_user }}">edit</a>
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