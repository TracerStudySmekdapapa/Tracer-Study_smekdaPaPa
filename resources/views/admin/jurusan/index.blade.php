<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

@extends('template.admin.master')

@section('konten')
    <section class="bg-[#eee] grid  grid-col-2 md:grid-cols-12 px-[30px] box-border py-5 min-h-[1000px]">
        <div class="md:col-span-2 relative hidden md:block">
            @include('template.admin.sidebar')
        </div>
        <div class="md:col-span-10 md:mr-10">
            @include('template.admin.header')


            <div class="overflow-x-auto lg:overflow-visible  mt-20">

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                        <thead class="ltr:text-left rtl:text-right">
                            <tr>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                    Name Jurusan
                                </th>
                                <th class="px-4 py-2"></th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                    AKSI
                                </th>

                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 text-center">



                            @foreach ($jurusan as $index => $item)
                                <tr>
                                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                        {{ $item->nama_jurusan }}
                                    </td>
                                    <td></td>

                                    <td class=" py-2 px">

                                        <a href="#"
                                            class="inline-block  rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                                            <img src="{{ asset('assets/jurusan-edit.svg') }}" alt="edit icon">
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>




        </div>


    </section>
@endsection










{{-- 

@foreach ($jurusan as $index => $item)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $item->nama_jurusan }}</td>
        <td>
            <form action="{{ route('jurusan.destroy', $item->id_jurusan) }}" method="POST">

                <a href="{{ route('jurusan.show', $item->id_jurusan) }}">Show</a>

                <a href="{{ route('jurusan.edit', $item->id_jurusan) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
@endforeach --}}
