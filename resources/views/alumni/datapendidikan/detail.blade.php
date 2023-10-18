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
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                            aksi
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
                            <td><a href="{{ route('editDataPendidikan', $item->id_pendidikan) }}"
                                    class="rounded    px-5 py-2 text-black font-semibold bg-red-500">Edit</a></td>
                            <td>
                                <form action="{{ route('deleteDataPendidikan', $item->id_pendidikan) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">submit</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>



            <div
                class="relative z-10 min-w-[300px]  max-w-[332px] min-h-[200px] max-h-[237px] rounded-[10px]  bg-white shadow-lg pt-2 overflow-y-auto">
                <div class="flex justify-start  px-3 space-x-3">
                    <div
                        class="translate-y-2 rounded-full min-w-[40px] h-[40px] bg-primary grid place-items-center text-white font-semibold">
                        1
                    </div>
                    <div class="flex flex-col text-[14px] capitalize">
                        <h1 class="font-semibold text-lg">Senior Database engginer developer</h1>
                        <p class="text-primary font-normal">PT.Arg Solusi Teknologi indonesia merdeka</p>
                        <div class="text-black/80 flex justify-between py-1">
                            <p>jajaran direksi</p>
                            <p>2023 s/d 2024</p>
                        </div>
                    </div>
                </div>
                <div class="w-full   px-[55px] place-content-center mt-1 bg-primary rounded-[10px] rounded-ss-[30px] ">
                    <p class="text-white font-light leading-[22px] text-[14px]  py-[15px]">
                        jalan puti bungsu 17B, Jl. Belanti Permai 2 No.Kav 2, Kota Padang, Sumatera Barat 25173
                    </p>
                </div>
            </div>



        </div>
    </main>
    @include('template.utils.footer')
@endsection
