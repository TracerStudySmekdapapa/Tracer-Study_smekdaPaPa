<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>


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
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody class="text-center divide-x capitalize">
                        {{-- looping --}}

                        {{-- @if ($search || $tamatan) --}}
                        @forelse ($alumni as $item)
                            <tr class="divide-x bg-gray-50">
                                <td class=" py-4   max-w-[350px] ">
                                    <div class="grid grid-cols-2 place-items-center mx-auto w-[200px] ">
                                        <div class="rounded-full w-[30px] h-[30px] bg-rose-600 ml-5"></div>
                                        <h1 class="">{{ $item->name }}</h1>
                                    </div>
                                </td>
                                <td>{{ $item->nisn }}</td>
                                <td>{{ $item->nama_jurusan }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->tamatan }}</td>
                                <td>
                                    <div x-data="{
                                        tooltipVisible: false,
                                        tooltipText: '{{ $item->name }}',
                                        tooltipArrow: true,
                                        tooltipPosition: 'top',
                                    }" x-init="$refs.content.addEventListener('mouseenter', () => { tooltipVisible = true; });
                                    $refs.content.addEventListener('mouseleave', () => { tooltipVisible = false; });" class="relative">
                                        <div x-ref="tooltip" x-show="tooltipVisible"
                                            :class="{
                                                'top-0 left-1/2 -translate-x-1/2 -mt-0.5 -translate-y-full': tooltipPosition ==
                                                    'top',
                                                'top-1/2 -translate-y-1/2 -ml-0.5 left-0 -translate-x-full': tooltipPosition ==
                                                    'left',
                                                'bottom-0 left-1/2 -translate-x-1/2 -mb-0.5 translate-y-full': tooltipPosition ==
                                                    'bottom',
                                                'top-1/2 -translate-y-1/2 -mr-0.5 right-0 translate-x-full': tooltipPosition ==
                                                    'right'
                                            }"
                                            class="absolute w-auto text-sm" x-cloak>
                                            <div x-show="tooltipVisible" x-transition
                                                class="relative px-2 py-1 text-white bg-black rounded bg-opacity-90">
                                                <p x-text="tooltipText"
                                                    class="flex-shrink-0 block text-xs whitespace-nowrap">
                                                </p>
                                                <div x-ref="tooltipArrow" x-show="tooltipArrow"
                                                    :class="{
                                                        'bottom-0 -translate-x-1/2 left-1/2 w-2.5 translate-y-full': tooltipPosition ==
                                                            'top',
                                                        'right-0 -translate-y-1/2 top-1/2 h-2.5 -mt-px translate-x-full': tooltipPosition ==
                                                            'left',
                                                        'top-0 -translate-x-1/2 left-1/2 w-2.5 -translate-y-full': tooltipPosition ==
                                                            'bottom',
                                                        'left-0 -translate-y-1/2 top-1/2 h-2.5 -mt-px -translate-x-full': tooltipPosition ==
                                                            'right'
                                                    }"
                                                    class="absolute inline-flex items-center justify-center overflow-hidden">
                                                    <div :class="{
                                                        'origin-top-left -rotate-45': tooltipPosition ==
                                                            'top',
                                                        'origin-top-left rotate-45': tooltipPosition ==
                                                            'left',
                                                        'origin-bottom-left rotate-45': tooltipPosition ==
                                                            'bottom',
                                                        'origin-top-right -rotate-45': tooltipPosition == 'right'
                                                    }"
                                                        class="w-1.5 h-1.5 transform bg-black bg-opacity-90"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <a x-ref="content" class="block w-full"
                                            href="{{ route('adminDetailAlumni', $item->id_pribadi) }}"><img class="mx-auto"
                                                src="{{ asset('assets/dot.svg') }}" alt="dot" /></a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-gray-50">
                                <td colspan="6">TIDAK ADA DATA YANG DITEMUKAN</td>
                            </tr>
                        @endforelse
                        {{-- @else
                            <tr class="bg-gray-50">
                                <td colspan="6">SILAHKAN CARI NAMA ATAU NISN ALUMNI</td>
                            </tr>
                        @endif --}}


                    </tbody>

                </table>
            </div>


        </div>
        </div>


    </section>
@endsection
