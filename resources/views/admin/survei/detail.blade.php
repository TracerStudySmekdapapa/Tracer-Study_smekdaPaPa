<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

@extends('template.admin.master')

@section('konten')
    <section class="bg-white grid  grid-col-2 md:grid-cols-12 px-[30px] box-border py-5 min-h-[1000px]">
        <div class="relative hidden md:col-span-2 md:block">
            @include('template.admin.sidebar')
        </div>
        <div class="md:col-span-10 md:mr-10">
            <section class="grid grid-cols-1 mt-10 capitalize md:grid-cols-2 gap-x-4 ">
                <div class="">
                    <h1 class="font-bold">Hasil Survei <span class="text-green-500"> {{ $data->first()->user->name }}
                        </span></h1>
                    @foreach ($data as $index => $item)
                        <div class="flex space-x-5">

                            <h1 class="min-w-[600px] mt-5">{{ $index + 1 }} . {{ $item->survei->pertanyaan }}</h1>
                            <div class="flex mt-5 space-x-10">
                                @foreach (['SB' => 'Sangat Bagus', 'B' => 'Bagus', 'C' => 'Cukup', 'K' => 'Kurang', 'SK' => 'Sangat Kurang'] as $value => $label)
                                    <div class="flex justify-center space-x-2 items-center min-w-[150px]">
                                        <input type="radio" {{ $item->jawaban == $value ? 'checked' : '' }} required>
                                        <label>{{ $label }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

        </div>


    </section>
@endsection
