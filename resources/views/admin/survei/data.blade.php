@extends('template.admin.master')

@section('konten')
    <section class="bg-[#eee]/20 grid  grid-col-2 md:grid-cols-12 px-[30px] box-border py-5 min-h-[1000px]">
        <div class="relative hidden md:col-span-2 md:block">
            @include('template.admin.sidebar')
        </div>
        <div class="md:col-span-10 md:mr-10">
            @include('template.admin.header')


            <div class="mt-20 overflow-x-auto lg:overflow-visible ">
                <div class="flex items-center justify-end space-x-2 ">
                    <a href="" class=" ml-auto px-4 py-1.5  bg-green-600 text-white rounded-md text-sm">Export to
                        .xlsx</a>
                    <div>
                        @include('admin.survei.info.index')
                    </div>
                </div>
                <table
                    class="relative z-20 rounded-lg bg-primary/5 min-w-[800px]  w-full  mt-6 overflow-x-scroll lg:overflow-x-hidden">
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
                                profile
                            </th>
                            <th>nisn</th>
                            <th>jurusan</th>
                            <th>jenis Kelamin</th>
                            <th>tamatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center capitalize divide-x">
                        @forelse ($data as $item)
                            <tr class="divide-x bg-gray-50">
                                <td class=" py-4   max-w-[350px] ">
                                    <h1 class="">{{ $item->name }}</h1>
                                </td>
                                <td>{{ $item->nisn }}</td>
                                <td>{{ $item->nama_jurusan }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->tamatan }}</td>
                                <td><a href="{{ route('detailUserSurvei', $item->id_user) }}"><img class="mx-auto"
                                            src="{{ asset('assets/dot.svg') }}" alt="dot" /></a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-red-600">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>


        </div>
        </div>


    </section>
@endsection
