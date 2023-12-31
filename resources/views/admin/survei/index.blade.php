@extends('template.admin.master')

@section('konten')
    <section class="bg-[#eee]/20 grid  grid-col-2 md:grid-cols-12 px-[30px] box-border py-5 min-h-[1000px]">
        <div class="relative hidden md:col-span-2 md:block">
            @include('template.admin.sidebar')
        </div>
        <div class="md:col-span-10 md:mr-10">
            @include('template.admin.header')


            <div class="mt-20 overflow-x-auto lg:overflow-visible ">

                <div class="flex items-center justify-between my-3">
                    <h1 class=" underline-offset-4"> <a href="{{ route('createSurvei') }}"
                            class="font-bold text-[20px] underline">[+] Tambah Survei</a></h1>

                    <div class="flex items-center space-x-3">

                        @include('admin.survei.reset.index')
                        <a href="{{ route('exportPertanyaanSurvei') }}"
                            class="flex px-4 py-1 ml-auto space-x-2 text-sm text-white transition-colors duration-200 bg-green-600 rounded-md hover:bg-green-800">
                            <img src="{{ asset('assets/file-exel.svg') }}" alt="exel" class="w-[20px]">
                            <span class="text-sm font-semibold">Export to exel </span>
                        </a>
                    </div>
                </div>
                <table
                    class="relative z-20 rounded-lg bg-primary/5 min-w-[800px]  w-full  mt-2  overflow-x-scroll lg:overflow-x-hidden">
                    <thead class="relative overflow-hidden bg-transparent rounded-full">
                        <tr>

                            <td class="absolute left-5 top-5">
                                <svg width="37" height="10" viewBox="0 0 37 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="Group 27">
                                        <circle id="Ellipse 19" cx="5" cy="5" r="5" fill="#FF0000" />
                                        <circle id="Ellipse 20" cx="18" cy="5" r="5" fill="#FFE500" />
                                        <circle id="Ellipse 21" cx="32" cy="5" r="5" fill="#05FF00" />
                                    </g>
                                </svg>

                            </td>
                        </tr>
                        <tr class="relative rounded-full overflow-hidden h-[50px] px-[50px] capitalize ">
                            <th class="pl-10 before:left-3 before:w-8">
                                Pertanyaan Survei
                            </th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="capitalize divide-x ">
                        @foreach ($data as $index => $item)
                            <tr class="divide-x bg-gray-50 ">
                                <td class=" py-4   max-w-[350px] px-5">
                                    <h1 class="px-3">

                                        <span>
                                            {{ $item->pertanyaan }}
                                    </h1>
                                    </span>
                                </td>
                                <td class="grid py-2 place-items-center">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('editSurvei', $item->id) }}"
                                            class="inline-block px-4 py-2 text-xs font-medium text-white bg-indigo-600 rounded hover:bg-indigo-700">
                                            <img src="{{ asset('assets/jurusan-edit.svg') }}" alt="edit icon">
                                        </a>
                                        <div>
                                            @include('admin.survei.deleteAlert.index')
                                        </div>
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
