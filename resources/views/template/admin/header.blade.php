<nav class="w-full h-[30px] grid grid-cols-2  mt-2 lg:mt-8 items-center">
    <h1 class="font-bold text-[18px] lg:text-[30px] ">{{ $title_page }}</h1>
    {{-- poto profile --}}
    {{-- @dd() --}}
    <div class="w-full h-full bg-transparent rounded-[20px]  px-5 py-1.5  flex items-center justify-end space-x-10">

        <div>
            <a href="{{ route('pesan') }}" class="relative">
                <img src="{{ asset('assets/pesan.svg') }}" alt="pesan">
                <span
                    class="border-2 border-white box-content w-[3px] h-[3px] lg:w-[7px] lg:h-[7px] bg-red-500 rounded-full absolute z-20 top-1 right-0.5 lg:top-0.5 lg:right-0"></span>
            </a>
        </div>


        <div x-data={open:false} @click.outside="open = false" class="relative">
            <div @click="open = ! open" class="relative hover:cursor-pointer ">
                <img src="{{ asset('assets/nitif.svg') }}" alt="pesanotof"
                    class="relative z-10 max-w-[22px] lg:max-w-full" />
                @if ($tidakAlumni->count() > 0)
                    <span
                        class="border-2 border-white box-content w-[3px] h-[3px] lg:w-[7px] lg:h-[7px] bg-red-500 rounded-full absolute z-20 top-1 right-0.5 lg:top-0.5 lg:right-0"></span>
                @endif
                @if ($tolakAlumni->count() > 0)
                    <span
                        class="border-2 border-white box-content w-[3px] h-[3px] lg:w-[7px] lg:h-[7px] bg-red-500 rounded-full absolute z-20 top-1 right-0.5 lg:top-0.5 lg:right-0"></span>
                @endif
            </div>
            <div x-show="open"
                class="w-[200px] min-h-[50px] max-h-[300px] rounded-md z-50 absolute bg-white shadow -left-40 top-10">
                <div
                    class="w-full min-h-[50px] max-h-[300px] flex flex-col justify-evenly items-stretch  space-y-2 p-5 ">
                    @forelse ($tidakAlumni->isNotEmpty() ? $tidakAlumni : $tolakAlumni as $item)
                        <div>
                            <a href="{{ route('verifyDataAlumni') }}">
                                <h1 class="font-semibold">{{ $item->name }}</h1>
                                <p class="text-[10px] text-[#252525]/90">{{ $item->email }}</p>
                            </a>
                        </div>
                    @empty
                        <h1>Tidak Ada Data</h1>
                    @endforelse

                </div>

            </div>
        </div>


    </div>
</nav>
