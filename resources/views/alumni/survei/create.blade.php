@extends('template.master')
@section('content')
    <main class="overflow-x-hidden">
        @include('template.utils.navbar')

        <section>
            <div class="flex flex-col space-y-2">
                <h1 class="font-semibold text-xl">Pertanyaan</h1>
                <form action="{{ route('simpanSurvei') }}" method="POST" class="flex flex-col  pl-3 border-l border-gray-600">
                    @csrf
                    @foreach ($data as $index => $item)
                        <div class="mt-5 ">
                            <h1>{{ $index + 1 }} . {{ $item->pertanyaan }}</h1>
                            <div class="">
                                @foreach (['SB' => 'Sangat Bagus', 'B' => 'Bagus', 'C' => 'Cukup', 'K' => 'Kurang', 'SK' => 'Sangat Kurang'] as $value => $label)
                                    <div class="mt-1">
                                        <input type="radio" id="jawaban_{{ $item->id }}_{{ $value }}"
                                            name="jawaban[{{ $item->id }}]" value="{{ $value }}">
                                        <label
                                            for="jawaban_{{ $item->id }}_{{ $value }}">{{ $label }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    <div class="mt-10 flex flex-col md:flex-row md:space-x-3 md:space-y-0 space-y-3">

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
