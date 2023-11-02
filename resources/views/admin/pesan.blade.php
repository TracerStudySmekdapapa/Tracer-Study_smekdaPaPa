<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

@extends('template.admin.master')

@section('konten')
    <section class="bg-[#eee]/20 grid  grid-col-2 md:grid-cols-12 px-[30px] box-border py-5 min-h-[1000px]">
        <div class="relative hidden md:col-span-2 md:block">
            @include('template.admin.sidebar')
        </div>
        <div class="md:col-span-10 md:mr-10">
            @include('template.admin.header')


            <div class="mt-20 ">

                <div class="">
                    <div class="w-[100px] bg-blue-200 px-5 py-2 rounded-md ml-auto mr-10 my-10 font-semibold">
                        <span>
                            Info
                        </span>
                    </div>
                    <table class="min-w-full text-sm bg-white divide-y-2 divide-gray-200 mb-28">
                        <thead class="ltr:text-left rtl:text-right">
                            <tr>
                                <th class="px-4 py-2 text-gray-900 whitespace-nowrap">
                                    Name
                                </th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Pesan</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="text-center divide-y divide-gray-200">



                            @foreach ($pesan as $item)
                                <tr>
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $item->nama }}
                                    </td>
                                    <td>
                                        {{ $item->email }}
                                    </td>
                                    <td>
                                        <p class="text-[13px]">
                                            {{ $item->pesan }}
                                        </p>
                                    </td>
                                    <td>
                                        <form method="POST">
                                            @csrf
                                            @method('PATCH')

                                            @if ($item->status == 'terima' || $item->status == 'tolak')
                                                <button class="px-5 py-2 font-semibold text-white rounded-md bg-rose-500"
                                                    formaction={{ route('tolakPesan', $item->id) }}>hapus</button>
                                            @else
                                                <div class="grid w-full grid-cols-2 gap-1">
                                                    <button
                                                        class="px-5 py-2 font-semibold text-white rounded-md bg-rose-500"
                                                        formaction={{ route('tolakPesan', $item->id) }}>tolak</button>
                                                    <button
                                                        class="px-5 py-2 font-semibold text-white bg-blue-500 rounded-md"
                                                        formaction={{ route('terimaPesan', $item->id) }}>terima</button>
                                                </div>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table class="min-w-full text-sm bg-white divide-y-2 divide-gray-200">
                        <thead class="ltr:text-left rtl:text-right">
                            <tr>
                                <th class="px-4 py-2 text-gray-900 whitespace-nowrap">
                                    Name
                                </th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Pesan</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="text-center divide-y divide-gray-200">



                            @foreach ($testimoni as $item)
                                <tr>
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $item->nama }}
                                    </td>
                                    <td>
                                        {{ $item->email }}
                                    </td>
                                    <td>
                                        <p class="text-[13px]">
                                            {{ $item->pesan }}
                                        </p>
                                    </td>
                                    <td>
                                        <form method="POST">
                                            @csrf
                                            @method('PATCH')

                                            @if ($item->status == 'terima' || $item->status == 'tolak')
                                                <button class="px-5 py-2 font-semibold text-white rounded-md bg-rose-500"
                                                    formaction={{ route('tolakPesan', $item->id) }}>hapus</button>
                                            @else
                                                <div class="grid w-full grid-cols-2 gap-1">
                                                    <button
                                                        class="px-5 py-2 font-semibold text-white rounded-md bg-rose-500"
                                                        formaction={{ route('tolakPesan', $item->id) }}>tolak</button>
                                                    <button
                                                        class="px-5 py-2 font-semibold text-white bg-blue-500 rounded-md"
                                                        formaction={{ route('terimaPesan', $item->id) }}>terima</button>
                                                </div>
                                            @endif
                                        </form>
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
