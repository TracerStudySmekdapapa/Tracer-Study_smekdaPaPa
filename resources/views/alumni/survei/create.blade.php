@extends('template.master')
@section('content')
    <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-20 -left-32 z-0"></div>
    <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-80 -right-52 z-0"></div>
    <main>
        @include('template.utils.navbar')

        <section>
            <div class="flex">
                <h1>Pertanyaan</h1>
                <form action="{{ route('simpanSurvei') }}" method="POST">
                    @csrf
                    @foreach ($data as $item)
                        <div class="">
                            <h1>{{ $item->pertanyaan }}</h1>
                            <div class="">
                                @foreach (['SB' => 'Sangat Bagus', 'B' => 'Bagus', 'C' => 'Cukup', 'K' => 'Kurang', 'SK' => 'Sangat Kurang'] as $value => $label)
                                    <div class="">
                                        <input type="radio" id="jawaban_{{ $item->id }}_{{ $value }}"
                                            name="jawaban[{{ $item->id }}]" value="{{ $value }}" required>
                                        <label
                                            for="jawaban_{{ $item->id }}_{{ $value }}">{{ $label }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    <button type="submit">Submit</button>
                </form>


            </div>
        </section>
    </main>
    @include('template.utils.footer')
@endsection
