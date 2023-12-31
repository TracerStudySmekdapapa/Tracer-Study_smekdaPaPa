<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>


@extends('template.admin.master')

@section('konten')
    <section class="bg-[#eee]/20 grid  grid-col-2 md:grid-cols-12 px-[30px] box-border py-5 min-h-[1000px]">
        <div class="relative hidden md:col-span-2 md:block">
            @include('template.admin.sidebar')
        </div>
        <div class="md:col-span-10 md:mr-10">
            @include('template.admin.header')


            <div class="flex items-center justify-between mt-20 ">
                <div class="flex justify-center align-bottom ">
                    <form action="{{ route('dataAlumni') }}" method="get" id="form_search"
                        class="grid-flow-col-dense mt-4 md:grid gap-x-2 ">
                        <input id="input_search"
                            class="relative z-[23] block  min-w-[290px] max-w-[300px]  text-sm border border-gray-500 pl-5 w-full pr-12 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Cari Berdasarkan Nama / NISN" type="text" name="search"
                            value="{{ $search }}" />

                        <select name="status" id="status"
                            class="tamatan max-w-[150px]  h-[40px] rounded-lg border-gray-600 text-gray-700 sm:text-sm [&::-webkit-calendar-picker-indicator]:opacity-0">
                            <option value="semua">Semua</option>
                            <option value="bekerja" @selected($status == 'bekerja')>Bekerja
                            </option>
                            <option value="pendidikan" @selected($status == 'pendidikan')>Pendidikan
                            </option>
                        </select>


                        <select name="tamatan" id="tamatan"
                            class="tamatan max-w-[150px]  h-[40px] rounded-lg border-gray-600 text-gray-700 sm:text-sm [&::-webkit-calendar-picker-indicator]:opacity-0">
                            <option disabled selected>Tamatan</option>
                            <option onclick="handleClick()" value="">Semua</option>

                            @for ($tahun = Carbon\Carbon::now()->year; $tahun >= 2006; --$tahun)
                                <option value="{{ $tahun }}" onclick="heandleClick()"
                                    {{ request()->get('tamatan') == $tahun ? 'selected' : '' }}>
                                    {{ $tahun }}
                                </option>
                            @endfor

                        </select>


                    </form>
                </div>
                <div class="grid grid-cols-2 place-items-center gap-x-5 ">

                    <a href="{{ route('exportDataAlumni') }}"
                        class="flex px-4 py-1 ml-auto space-x-2 text-sm text-white transition-colors duration-200 bg-green-600 rounded-md hover:bg-green-800">
                        <img src="{{ asset('assets/file-exel.svg') }}" alt="exel" class="w-[20px]">
                        <span>Export to exel </span>
                    </a>
                    <div>
                        @include('admin.alumni.info.index')
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto lg:overflow-visible">
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
                            <th>bekerja</th>
                            <th>pendidikan</th>
                            <th>tamatan</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody class="text-center capitalize divide-x">

                        @forelse ($search || $status ? $results : $alumni as $item)
                            <tr class="divide-x bg-gray-50">
                                <td class="px-4 py-4 text-left">
                                    {{ $item->name }}
                                </td>
                                <td>{{ $item->nisn }}</td>
                                <td>
                                    @php
                                        if ($jurusan = $item->nama_jurusan) {
                                            $words = explode(' ', $jurusan);

                                            $abbreviation = '';
                                            foreach ($words as $word) {
                                                $abbreviation .= str($word[0]);
                                            }
                                            echo $abbreviation;
                                        } else {
                                            echo '-';
                                        }
                                    @endphp
                                </td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td> {{ $item->hasJob == 'true' ? 'Ya' : 'Tidak' }}</td>
                                <td> {{ $item->hasPendidikan == 'true' ? 'Ya' : 'Tidak' }}</td>
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
                                        {{-- @dd($item->id_pribadi) --}}
                                        <a x-ref="content" class="block w-full"
                                            href="{{ route('adminDetailAlumni', $item->id_pribadi ?? '-') }}"><img
                                                class="mx-auto" src="{{ asset('assets/dot.svg') }}" alt="dot" /></a>
                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr class="bg-gray-50">
                                <td colspan="8">TIDAK ADA DATA YANG DITEMUKAN</td>
                            </tr>
                        @endforelse
                    </tbody>

                    <tfoot class="bg-primary/5">
                        <tr>
                            <td class="px-5 py-1" colspan="8">{{ $search || $status ? $results : $alumni->links() }}
                            </td>
                        </tr>
                    </tfoot>

                </table>
            </div>

            <div class="my-2 text-base">
                <h1>Jumlah : {{ $search || $status ? $countSearch : $alumniCount }} orang</h1>
            </div>

        </div>


    </section>


    <script>
        const form_search = document.querySelector("#form_search");

        const status = document.querySelector('#status');
        const tamtan = document.querySelector('#tamatan');
        status.addEventListener('change', (e) => {
            form_search.submit();
        });
        tamatan.addEventListener('change', (e) => {
            form_search.submit();
        });
    </script>
@endsection
