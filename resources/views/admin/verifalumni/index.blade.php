<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

{{-- @dd($user) --}}

@extends('template.admin.master')

@section('konten')
    <section class="bg-[#eee]/20 grid  grid-col-2 md:grid-cols-12 px-[30px] box-border py-5 min-h-[1000px]">
        <div class="md:col-span-2 relative hidden md:block">
            @include('template.admin.sidebar')
        </div>
        <div class="md:col-span-10 md:mr-10">
            @include('template.admin.header')


            <div class="overflow-x-auto lg:overflow-visible   mt-20 ">
                <table
                    class="relative z-20 rounded-lg bg-primary/5 min-w-[800px]  w-full  mt-6 overflow-x-scroll lg:overflow-x-hidden">
                    <thead class="overflow-hidden bg-transparent rounded-full relative">
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
                            <th class="before:left-3 before:w-8 pl-10">
                                profile
                            </th>
                            <th>nisn</th>
                            <th>jurusan</th>
                            <th>jenis Kelamin</th>
                            <th>tamatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center divide-x capitalize">
                        @forelse ($tidakAlumni as $item)
                            <tr class="divide-x bg-gray-50">
                                <td class=" py-4   max-w-[350px] ">
                                    <h1 class="">{{ $item->name }}</h1>
                                </td>
                                <td>{{ $item->nisn }}</td>
                                <td>{{ $item->nama_jurusan }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->tamatan }}</td>
                                <td>
                                    <form action="{{ route('verifalumniStore', $item->id_user) }}" method="POST">
                                        @csrf
                                        <div
                                            class="w-full min-h-[20px] grid grid-cols-5 min-w-[100px] gap-x-1 text-white font-medium">
                                            <div class="col-span-2">
                                                <button formaction="{{ route('tolakVerifAlumni', $item->id_user) }}"
                                                    class="py-1.5
                                                    bg-rose-500 w-full rounded-md block ">Tolak</button>
                                            </div>
                                            <div class="col-span-3">
                                                <button type="submit"
                                                    class="py-1.5 bg-blue-500 rounded-md w-full block">Verif</button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
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
