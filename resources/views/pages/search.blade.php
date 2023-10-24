@extends('template.master')
@section('content')
    <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-20 -left-32 z-0"></div>
    <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-80 -right-52 z-0"></div>
    <main>
        <!--?  navigasi ==========-->
        @include('template.utils.navbar')
        <!--!  navigasi ==========-->

        <div class="w-[90%] mx-auto flex justify-end items-center mt-10">
            <div class="relative">
                <form action="{{ route('search') }}" method="get" id="form_search">
                    <div class="flex  items-center">
                        <div class="relative mr-5  w-full">
                            <input id="input_search"
                                class="relative z-[23] block  mt-1 text-sm border border-gray-500 pl-5 w-full pr-12 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="cari berdasarkan nama / nisn" type="text" required name="search"
                                value="{{ $search }}" />
                            <button type="submit" class=" absolute right-2 top-0  py-2 z-30 ">
                                <img src="{{ asset('assets/cari.svg') }}" alt="cari" class="scale-90" />
                            </button>
                        </div>
                        {{--  --}}
                        <div class="relative">
                            <div class="relative mt-1.5">
                                <input type="text" list="HeadlineActArtist" id="HeadlineAct"
                                    class="tamatan w-full rounded-lg border-gray-600 text-gray-700 sm:text-sm [&::-webkit-calendar-picker-indicator]:opacity-0"
                                    placeholder="tamatan" name="tamatan" value="{{ old('tamatan', $tamatan) }}" />

                                <span class="absolute inset-y-0 right-0 flex w-8 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-gray-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                    </svg>
                                </span>
                            </div>

                            <datalist name="HeadlineAct" id="HeadlineActArtist">

                                @for ($tahun = Carbon\Carbon::now()->year; $tahun >= 2006; --$tahun)
                                    <option value="{{ $tahun }}" onclick="heandleClick()"
                                        {{ $tamatan == $tahun ? 'selected' : '' }}>
                                        {{ $tahun }}
                                    </option>
                                @endfor
                            </datalist>
                        </div>
                        {{--  --}}
                    </div>

                </form>
            </div>
        </div>

        <div class="overflow-x-auto lg:overflow-visible  ">
            <table
                class="relative z-20 rounded-lg bg-primary/5 min-w-[800px] lg:w-[90%] mx-auto  mt-6 overflow-x-scroll lg:overflow-x-hidden">
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
                        <th>jenis_kelamin</th>
                        <th>tamatan</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody class="text-center divide-x">
                    @if ($search || $tamatan)
                        @forelse ($alumni as $item)
                            <tr class="divide-x bg-gray-50">
                                <td class=" py-4   max-w-[350px] ">
                                    <div class="grid grid-cols-2 place-items-center mx-auto w-[200px] ">
                                        <div class="rounded-full w-[30px] h-[30px] bg-rose-600 ml-5"></div>
                                        <h1 class="">{{ $item->name }}</h1>
                                    </div>
                                </td>
                                <td>{{ $item->nisn }}</td>
                                <td>{{ $item->jurusan }}</td>
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
                                            href="{{ route('detailAlumni', $item->id_pribadi) }}"><img class="mx-auto"
                                                src="{{ asset('assets/dot.svg') }}" alt="dot" /></a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-gray-50">
                                <td colspan="6">TIDAK ADA DATA YANG DITEMUKAN</td>
                            </tr>
                        @endforelse
                    @else
                        <tr class="bg-gray-50">
                            <td colspan="6">SILAHKAN CARI NAMA ATAU NISN ALUMNI</td>
                        </tr>
                    @endif


                </tbody>

                <tfoot class="bg-primary/5">
                    <tr>
                        <td colspan="6">
                            {{-- @if ($search) --}}
                            {{-- {{ $alumni->links() }} --}}
                            {{-- @endif --}}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </main>

    <!-- ?footer -->
    @include('template.utils.footer')
    <!-- !footer -->
    <script>
        const form_search = document.querySelector("#form_search");
        const input_search = document.querySelector("#input_search").value;

        window.addEventListener("keydown", (e) => {
            if (e.keyCode == 13) {
                form_search.submit();
            }
        });


        const tamatan = document.querySelector('.tamatan');
        tamatan.addEventListener('change', (e) => {
            form_search.submit();
        });
    </script>
@endsection
