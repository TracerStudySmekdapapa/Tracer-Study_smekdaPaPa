@extends('template.master')

@section('content')
    <main>
        @include('template.utils.navbar')

        <div class="overflow-x-auto my-20">
            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                <thead class="ltr:text-left rtl:text-right">
                    <tr>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                            Nama
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                            nama_univ
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                            fakultas
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                            prodi
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                            alamat_univ
                        </th>

                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($pendidikan as $item)
                        <tr>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                {{ $item->alumni->user->name }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                {{ $item->nama_univ }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"> {{ $item->fakultas }}</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"> {{ $item->prodi }}</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"> {{ $item->alamat_univ }}</td>
                            <td><a href=""
                                    class="rounded    px-5 py-2 text-black font-semibold bg-yellow-500">Edit</a></td>
                            <td><a href="" class="rounded    px-5 py-2 text-white font-semibold bg-red-500">Hapus</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </main>
    @include('template.utils.footer')
@endsection
