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


            <div class="flex items-center justify-end mt-20 ">
                <div class="flex justify-center align-bottom ">
                    <form action="{{ route('dataAlumni') }}" method="get" id="form_search"
                        class="grid-flow-col-dense mt-4 md:grid gap-x-2 ">
                        <input id="input_search"
                            class="relative z-[23] block  min-w-[290px] max-w-[300px]  text-sm border border-gray-500 pl-5 w-full pr-12 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Cari Berdasarkan Nama / NISN" type="text" name="search" value="" />
                    </form>
                </div>
            </div>
            <div class="overflow-x-auto lg:overflow-visible">
                <table
                    class="relative z-20 rounded-lg bg-primary/5 min-w-[800px]  w-full  mt-6 overflow-x-scroll lg:overflow-x-hidden">
                    <thead class="relative overflow-hidden bg-transparent rounded-full">

                        <tr class="relative rounded-full overflow-hidden h-[50px] px-[50px] capitalize ">
                            <th>No</th>
                            <th>
                                Nama
                            </th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center divide-x">

                        @foreach ($data as $index => $item)
                            <tr class="divide-x bg-gray-50">
                                <td>{{ $index + 1 }}</td>
                                <td class="px-4 py-4 text-left">
                                    {{ $item->name }}
                                </td>
                                <td>{{ $item->email }}</td>

                                <td>
                                    <div class="flex items-center justify-center space-x-2">

                                        <a href="{{ route('jurusan.edit', $item->id_user) }}"
                                            class="inline-block px-4 py-2 text-xs font-medium text-white bg-indigo-600 rounded hover:bg-indigo-700">
                                            <img src="{{ asset('assets/jurusan-edit.svg') }}" alt="edit icon">
                                        </a>

                                        <div>
                                            <div x-ref="content">

                                                <div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen=false"
                                                    class="relative z-50 w-auto h-auto">



                                                    <button @click="modalOpen=true"
                                                        class="inline-flex items-center justify-center p-2 text-sm font-medium rounded-sm transition-colorse bg-rose-500 ">

                                                        <img src="{{ asset('assets/delete.svg') }}" alt="hapus">

                                                    </button>






                                                    <template x-teleport="body">
                                                        <div x-show="modalOpen"
                                                            class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen"
                                                            x-cloak>
                                                            <div x-show="modalOpen"
                                                                x-transition:enter="ease-out duration-300"
                                                                x-transition:enter-start="opacity-0"
                                                                x-transition:enter-end="opacity-100"
                                                                x-transition:leave="ease-in duration-300"
                                                                x-transition:leave-start="opacity-100"
                                                                x-transition:leave-end="opacity-0" @click="modalOpen=false"
                                                                class="absolute inset-0 w-full h-full bg-black bg-opacity-40">
                                                            </div>
                                                            <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen"
                                                                x-transition:enter="ease-out duration-300"
                                                                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                                x-transition:leave="ease-in duration-200"
                                                                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                                class="relative w-full py-6 bg-white px-7 sm:max-w-lg sm:rounded-lg">
                                                                <div class="flex items-center justify-between pb-2">
                                                                    <h3 class="text-lg font-semibold">Yakin Mau Menghapus
                                                                    </h3>
                                                                    <button @click="modalOpen=false"
                                                                        class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                                                                        <svg class="w-5 h-5"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            stroke-width="1.5" stroke="currentColor">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                d="M6 18L18 6M6 6l12 12" />
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                                <div class="relative w-auto">
                                                                    <p class="mt-2 mb-5 text-black/70">
                                                                        jurusan <span class="font-bold">
                                                                            {{ $item->nama }} </span> akan dihapus
                                                                    </p>
                                                                    <div class="">
                                                                        <form x-ref="content"
                                                                            action="{{ route('jurusan.destroy', $item->id_user) }}"
                                                                            method="POST"
                                                                            class="grid grid-cols-7 py-2 gap-x-2">

                                                                            @csrf
                                                                            @method('DELETE')




                                                                            <button type="button"
                                                                                class="block col-span-4 px-6 py-2 font-semibold text-white bg-gray-500 rounded-md "
                                                                                @click="modalOpen=false">cancle</button>
                                                                            <button type="submit"
                                                                                class="block col-span-3 px-6 font-semibold text-white rounded-md bg-rose-400">
                                                                                iya, hapus
                                                                            </button>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </template>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                    <tfoot class="">
                        <tr>
                            <td class="px-5 py-1" colspan="8">{{ $data->links() }}
                            </td>
                        </tr>
                    </tfoot>

                </table>
            </div>

            <div class="my-2 text-base">
                <h1>Jumlah : {{ $dataCount }} orang</h1>
            </div>

        </div>


    </section>
@endsection
