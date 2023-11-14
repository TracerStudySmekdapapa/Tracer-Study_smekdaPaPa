@extends('template.master')
@section('content')
    <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-20 -left-32 z-0"></div>
    <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-80 -right-52 z-0"></div>
    <main>
        @include('template.utils.navbar')

        <section>
            <div class="flex flex-col space-y-3">
                <h1>Pertanyaan</h1>
                <form action="{{ route('simpanSurvei') }}" method="POST" class="flex flex-col space-y-3">
                    @csrf
                    @foreach ($data as $index => $item)
                        <div class="">
                            <h1>{{ $index + 1 }} . {{ $item->pertanyaan }}</h1>
                            <div class="">
                                @foreach (['SB' => 'Sangat Bagus', 'B' => 'Bagus', 'C' => 'Cukup', 'K' => 'Kurang', 'SK' => 'Sangat Kurang'] as $value => $label)
                                    <div class="mt-1">
                                        <input type="radio" id="jawaban_{{ $item->id }}_{{ $value }}"
                                            name="jawaban[{{ $item->id }}]" value="{{ $value }}" required>
                                        <label
                                            for="jawaban_{{ $item->id }}_{{ $value }}">{{ $label }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    <div class="mt-3">

                        <button type="reset"
                            class="inline px-5 py-2 mr-2 font-semibold text-white rounded-md bg-rose-500 hover:bg-black">Reset
                            Jawaban</button>
                        <button type="submit"
                            class="inline px-10 py-2 font-semibold text-white rounded-md bg-primary hover:bg-black">Kirim
                            Jawaban</button>
                    </div>
                </form>


            </div>
        </section>
    </main>
    @include('template.utils.footer')
@endsection
