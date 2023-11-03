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





                    <div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen=false" class="relative z-50 w-auto h-auto">


                        <div @click="modalOpen=true"
                            class="max-w-[150px] bg-blue-200 cursor-pointer py-2 rounded-md ml-auto mr-10 my-10  flex items-center justify-center space-x-2">
                            <img src="{{ asset('assets/info.svg') }}" alt="info">
                            <span class="font-bold">
                                Info
                            </span>
                        </div <template x-teleport="body">
                        <div x-show="modalOpen"
                            class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen" x-cloak>
                            <div x-show="modalOpen" x-transition:enter="ease-out duration-300"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0" @click="modalOpen=false"
                                class="absolute inset-0 w-full h-full bg-black bg-opacity-40"></div>
                            <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen"
                                x-transition:enter="ease-out duration-300"
                                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave="ease-in duration-200"
                                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                class="relative w-full py-6 bg-white px-7 sm:max-w-lg sm:rounded-lg">
                                <div class="flex items-center justify-between pb-2">
                                    <h3 class="text-lg font-semibold">Info</h3>
                                    <button @click="modalOpen=false"
                                        class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="relative w-auto">
                                    <div class="my-4">
                                        <h1
                                            class="px-6 py-2 rounded-md my-1 cursor-no-drop bg-rose-500 text-white max-w-[100px]">
                                            Tolak</h1>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum excepturi et est.
                                            Rerum repellat temporibus veritatis ullam numquam, eius debitis?</p>
                                    </div>
                                    <div class="my-4">
                                        <h1
                                            class="px-6 py-2 rounded-md my-1 cursor-no-drop bg-blue-500 text-white max-w-[100px]">
                                            Terima
                                        </h1>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum excepturi et est.
                                            Rerum repellat temporibus veritatis ullam numquam, eius debitis?</p>
                                    </div>
                                    <div class="my-4">
                                        <h1
                                            class="px-6 py-2 rounded-md my-1 cursor-no-drop bg-red-500 text-white max-w-[100px]">
                                            Hapus</h1>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum excepturi et est.
                                            Rerum repellat temporibus veritatis ullam numquam, eius debitis?</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        </template>
                    </div>







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



                            @foreach ($pesan as $item)
                                <tr>
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $item->nama }}
                                    </td>
                                    <td>
                                        {{ $item->email }}
                                    </td>
                                    <td>
                                        <p class="text-[13px] px-5">
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
