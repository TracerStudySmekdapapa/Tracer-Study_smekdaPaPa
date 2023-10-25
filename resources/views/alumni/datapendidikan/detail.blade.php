@extends('template.master')

@section('content')
    <main>
        @include('template.utils.navbar')
        <div class="grid grid-cols-2 md:grid-cols-3 gap-5">
            @foreach ($pendidikan as $index => $item)
                <div
                    class="relative z-10 min-w-[300px]  max-w-[332px] min-h-[235px] max-h-[300px] rounded-[10px]  bg-white shadow-lg py-4 overflow-y-auto">
                    <div class="flex justify-start  px-5 space-x-3">
                        <div
                            class="translate-y-2 rounded-full min-w-[40px] h-[40px] bg-primary grid place-items-center text-white font-semibold">
                            {{ $index + 1 }}
                        </div>
                        <div class="flex flex-col text-[14px] capitalize">
                            <h1 class="font-semibold text-lg">{{ $item->nama_univ }}</h1>
                            <p class="text-primary font-normal">{{ $item->fakultas }}</p>
                            <div class="text-black/80 flex justify-start pr-3 my-0.5">
                                <p>{{ $item->prodi }}</p>
                            </div>
                            <p
                                class="text-black/80 font-light leading-[22px] text-[14px]  py-[15px] min-h-[98px] max-h-[110px] relative overflow-y-auto">
                                {{ $item->alamat_univ }} </p>
                            <div class="grid grid-cols-2 gap-2 ">
                                <div>
                                    <a href="{{ route('editDataPendidikan', $item->id_pendidikan) }}"
                                        class="block w-full text-center rounded-md   py-2 bg-yellow-500 text-black font-semibold">Edit</a>
                                </div>
                                <div>

                                    <form action="{{ route('deleteDataPendidikan', $item->id_pendidikan) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="block w-full text-center rounded-md py-2 text-white bg-rose-500  font-semibold">Hapus</button>
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
