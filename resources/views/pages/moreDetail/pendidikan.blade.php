@extends('template.master')

@section('content')
    <main>
        @include('template.utils.navbar')

        <div
            class="overflow-x-auto lg:mt-20 mt-10 mb-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3  lg:gap-5 gap-y-10 place-items-center ">


            @php
                $count = 0;
            @endphp
            @foreach ($pendidikan as $key => $item)
                <div
                    class="relative z-10 min-w-[332px]  max-w-[332px] min-h-[237px] max-h-[237px] rounded-[10px]  bg-white shadow-lg border-[0.5px] border-primary pt-2 overflow-y-auto">
                    <div class="flex justify-start  px-3 space-x-3">
                        <div
                            class="translate-y-2 rounded-full min-w-[40px] h-[40px] bg-primary grid place-items-center text-white font-semibold">
                            {{ $count + 1 }}
                        </div>
                        <div class="flex flex-col text-[14px] capitalize">
                            <h1 class="font-semibold text-lg">{{ $item->nama_univ }}</h1>
                            <p class="text-primary font-normal">{{ $item->prodi }}</p>
                            <div class="text-black/80 flex justify-between py-1">
                                <p>{{ $item->fakultas }}</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="w-full   absolute left-0 right-0 bottom-0 px-[55px] place-content-center mt-1 bg-primary rounded-[10px] rounded-ss-[30px] ">
                        <p class="text-white font-light leading-[21px] text-[14px]  py-[15px]">
                            {{ $item->alamat_univ }}
                        </p>
                    </div>
                </div>
                @php
                    $count++;
                @endphp
            @endforeach
        </div>
    </main>
    @include('template.utils.footer')
@endsection
