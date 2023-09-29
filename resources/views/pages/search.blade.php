@extends('template.master')
@section('content')
    <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-20 -left-32 z-0"></div>
    <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-80 -right-52 z-0"></div>
    <main>
        <!--?  navigasi ==========-->
        @include('template.utils.navbar')
        <!--!  navigasi ==========-->

        <div class="w-[90%] mx-auto flex justify-between">
            <h1>data</h1>

            <div class="relative">
                <form action="{{ route('search') }}" method="get" id="form_search">
                    <input id="input_search"
                        class="block w-[100%] mt-1 text-sm border border-gray-500 pl-5 pr-12 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="cari berdasarkan nama" type="text" required name="search" />
                    <button type="submit" class="#submit_btn">
                        <img src="{{ asset('assets/cari.svg') }}" alt="cari" class="absolute top-0 right-0 p-2" />
                        {{-- <img src="../public/assets/cari.svg" alt="cari" class="absolute top-0 right-0 p-2" /> --}}
                    </button>
                </form>
            </div>
        </div>

        <table class="relative z-50 rounded-lg w-[90%] mx-auto table-auto mt-6 overflow-visible">
            <thead class="bg-primary/5 rounded-lg">
                <tr class="relative h-[50px] px-[50px]">
                    <th
                        class="before:content-[url('../public/assets/icon.svg')] before:absolute before:left-3 before:w-8 pl-10">
                        profile
                    </th>
                    <th>nisn</th>
                    <th>jurusan</th>
                    <th>jenis_kelamin</th>
                    <th>angkatan</th>
                    <th>lainnya</th>
                </tr>
            </thead>

            <tbody class="text-center divide-x">
                @if ($search)
                    @foreach ($alumni as $item)
                        <!-- looping here -->
                        <tr class="divide-x bg-gray-50">
                            <td class="flex items-center space-x-4 justify-center mx-auto py-5">
                                <div class="rounded-full w-[30px] h-[30px] bg-rose-600 ml-5"></div>
                                <h1 class="max-w-[40%]">{{ $item->name }}</h1>
                            </td>
                            <td>{{ $item->nisn }}</td>
                            <td>{{ $item->angkatan }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->angkatan }}</td>
                            <td>
                                <div x-data="{
                                    tooltipVisible: false,
                                    tooltipText: '{{ $item->name }}',
                                    tooltipArrow: true,
                                    tooltipPosition: 'right',
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
                                            <p x-text="tooltipText" class="flex-shrink-0 block text-xs whitespace-nowrap">
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
                                        href="{{ route('detailAlumni', $item->id_alumni) }}"><img class="mx-auto"
                                            src="{{ asset('assets/dot.svg') }}" alt="dot" /></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="bg-gray-50">
                        <td colspan="6">TIDAK ADA DATA YANG DITEMUKAN</td>
                    </tr>
                @endif

                <!-- end delete aja -->
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
    </script>
@endsection
