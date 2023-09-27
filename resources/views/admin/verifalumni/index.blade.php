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
                    <table class="table-fixed w-full text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Angkatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($user as $data)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->nisn }}</td>
                                    <td>{{ $data->angkatan }}</td>
                                    <td>
                                        <form action="{{ route('verifalumniStore', $data->id_user) }}" method="POST">
                                            @csrf

                                            <button
                                                formaction="{{ route('tolakVerifAlumni', $data->id_user) }}">tolak</button>
                                            <button type="submit">veriaf</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="5">Tidak ada data</th>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
