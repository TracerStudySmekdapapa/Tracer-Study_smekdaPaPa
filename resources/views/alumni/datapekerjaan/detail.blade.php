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
                            Nama Pekerjaan
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                            Nama Instansi
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                            Alamanat instansi
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                            jabatan
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                            tahun masuk
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                            tahun keluar
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                            aksi
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($pekerjaan as $item)
                        <tr>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                {{ $item->alumni->user->name }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                {{ $item->nama_pekerjaan }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"> {{ $item->nama_instansi }}</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"> {{ $item->alamat_instansi }}</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"> {{ $item->jabatan }}</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"> {{ $item->thn_masuk }}</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"> {{ $item->thn_keluar }}</td>
                            <td><a href="{{ route('editDataPekerjaan', $item->id_pekerjaan) }}"
                                    class="rounded px-5 py-2 text-black font-semibold bg-yellow-500">Edit</a></td>
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
