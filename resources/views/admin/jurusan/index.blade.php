@extends('template.admin.master')

@section('konten')
    <section class=" bg-[#eee]/20 grid  grid-col-2 md:grid-cols-12 px-[30px] box-border py-5 ">
        <div class="md:col-span-2 relative hidden md:block">
            @include('template.admin.sidebar')
        </div>
        <div class="md:col-span-10 md:mr-10">
            @include('template.admin.header')
            <div class="overflow-x-auto lg:overflow-visible  mt-20">

                <div class="overflow-x-auto">
                    <h1 class="my-5  underline-offset-4"> <a href="{{ route('jurusan.create') }}"
                            class="font-bold text-[20px] underline">[+] Tambah Jurusan</a></h1>
                    <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                        <thead class="ltr:text-left rtl:text-right">
                            <tr>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                    Name Jurusan
                                </th>
                                <th class="px-4 py-2"></th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                    AKSI
                                </th>

                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 text-center">



                            @foreach ($jurusan as $index => $item)
                                <tr>
                                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                        {{ $item->nama_jurusan }}
                                    </td>
                                    <td></td>

                                    <td class="py-2 px">
                                        <div class="flex items-center space-x-2">

                                            <a href="{{ route('jurusan.edit', $item->id_jurusan) }}"
                                                class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                                                <img src="{{ asset('assets/jurusan-edit.svg') }}" alt="edit icon">
                                            </a>

                                            <form method="POST" action="{{ route('jurusan.destroy', $item->id_jurusan) }}"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="px-5 py-2 rounded bg-red-500 text-white">
                                                    <img src="{{ asset('assets/delete.svg') }}" alt="hapus">
                                                </button>
                                            </form>

                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


    </section>
@endsection
