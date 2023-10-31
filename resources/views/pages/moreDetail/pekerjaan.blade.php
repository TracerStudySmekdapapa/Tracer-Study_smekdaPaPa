@extends('template.master')

@section('content')
    <main>
        @include('template.utils.navbar')

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mt-4 place-items-center">


            @foreach ($pekerjaan as $index => $item)
                <div
                    class="relative z-10 min-w-[300px]  max-w-[332px] min-h-[230px] max-h-[280px] rounded-[10px]  bg-white shadow-lg py-4 ">
                    <div class="flex justify-start  px-5 space-x-3">
                        <div
                            class="translate-y-2 rounded-full min-w-[40px] h-[40px] bg-primary grid place-items-center text-white font-semibold">
                            {{ $index + 1 }}
                        </div>
                        <div class="flex flex-col text-[14px] capitalize">
                            <h1 class="font-semibold text-lg">{{ $item->nama_pekerjaan }}</h1>
                            <p class="text-primary font-normal my-0.5 min-h-[40px]">{{ $item->nama_instansi }}</p>
                            <div class="text-black/80 flex justify-between pr-3 my-0.5">
                                <p>{{ $item->jabatan }}</p>
                                <p>{{ $item->thn_masuk }} <span class="mx-1 lowercase">s/d</span> {{ $item->thn_keluar }}</p>
                            </div>
                            <p
                                class="text-black/80 font-light leading-[22px] text-[14px]  py-[15px] min-h-[97px] max-h-[110px] relative overflow-y-auto">
                                {{ $item->alamat_instansi }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
    @include('template.utils.footer')
@endsection
