<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

@extends('template.admin.master')

@section('konten')
    <section class="bg-[#eee]/20 grid  grid-col-2 md:grid-cols-12 px-[30px] box-border py-5 min-h-[1000px]">
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
                                    Name
                                </th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Pesan</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 text-center">



                            @foreach ($data as $index => $item)
                                <tr>
                                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                        {{ $item->nama }}
                                    </td>
                                    <td>
                                        {{ $item->email }}
                                    </td>
                                    <td>
                                        {{ $item->pesan }}
                                    </td>
                                    <td>
                                        <form method="POST">
                                            @csrf
                                            @method('PATCH')

                                            @if ($item->status == 'terima' || $item->status == 'tolak')
                                                <button formaction={{ route('tolakPesan', $item->id) }}>hapus</button>
                                            @else
                                                <button formaction={{ route('tolakPesan', $item->id) }}>-</button>
                                                <button formaction={{ route('terimaPesan', $item->id) }}>✓</button>
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
