@extends('template.master')

@section('content')
    <main>
        @include('template.utils.navbar')

        <div class="mt-1 md:mt-5 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-y-5 place-items-center md:gap-5">
            @foreach ($pekerjaan as $index => $item)
                <div
                    class="relative z-10 min-w-[300px]  max-w-[332px] min-h-[280px] max-h-[300px] rounded-[10px]  px-2 bg-white shadow-lg py-4 overflow-y-auto">
                    <div class="flex justify-start  px-5 space-x-3">
                        <div
                            class="translate-y-2 rounded-full min-w-[40px] h-[40px] bg-primary grid place-items-center text-white font-semibold">
                            {{ $index + 1 }}
                        </div>
                        <div class="flex flex-col text-[14px] capitalize">
                            <h1 class="font-semibold text-lg">{{ $item->nama_instansi }}</h1>
                            <p class="text-primary font-normal min-h-[40px]">{{ $item->alamat_instansi }}</p>
                            <div class="text-black/80 flex justify-between pr-3 my-0.5 min-h-[30px]">
                                <p>{{ $item->jabatan }}</p>
                                <p>{{ $item->thn_masuk }} s/d {{ $item->thn_keluar }}</p>
                            </div>
                            <p
                                class="text-black/80 font-light leading-[22px] text-[14px]  py-[15px] min-h-[97px] max-h-[110px] relative overflow-y-auto">
                                {{ $item->alamat_instansi }}
                            </p>
                            <div class="grid grid-cols-2 gap-2 ">
                                <div>
                                    <a href="{{ route('editDataPekerjaan', $item->id_pekerjaan) }}"
                                        class="block w-full text-center rounded-md   py-2 bg-yellow-500 text-black font-semibold">Edit</a>
                                </div>
                                <div>

                                    <form action="{{ route('deleteDataPekerjaan', $item->id_pekerjaan) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="block w-full text-center rounded-md py-2
                                            text-white bg-rose-500 font-semibold">Hapus</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </main>
    @include('template.utils.footer')
@endsection
