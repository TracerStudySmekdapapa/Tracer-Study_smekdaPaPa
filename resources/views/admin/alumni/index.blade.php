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
                                    <td>{{ $data->nisn }}</td>
                                    <td>{{ $data->jurusan }}</td>
                                    <td>
                                        <form action="{{ route('verifalumniStore', $data->id_user) }}" method="POST">
                                            @csrf

                                            <a href="{{ $data->id_user }}">edit</a>
                                            <button type="submit">delete</button>
                                        </form>
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
