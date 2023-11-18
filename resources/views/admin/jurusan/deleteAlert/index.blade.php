




    <div x-ref="content">

        <div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen=false" class="relative z-50 w-auto h-auto">



            <button @click="modalOpen=true"
                class="inline-flex  items-center justify-center text-sm font-medium transition-colorse  rounded-sm p-2 bg-rose-500 ">

                <img src="{{ asset('assets/delete.svg') }}" alt="hapus">

            </button>






            <template x-teleport="body">
                <div x-show="modalOpen"
                    class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen" x-cloak>
                    <div x-show="modalOpen" x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" @click="modalOpen=false"
                        class="absolute inset-0 w-full h-full bg-black bg-opacity-40"></div>
                    <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen" x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        class="relative w-full py-6 bg-white px-7 sm:max-w-lg sm:rounded-lg">
                        <div class="flex items-center justify-between pb-2">
                            <h3 class="text-lg font-semibold">Yakin Mau Menghapus</h3>
                            <button @click="modalOpen=false"
                                class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="relative w-auto">
                            <p class="text-black/70 mt-2 mb-5">
                                jurusan <span class="font-bold"> {{ $item->nama_jurusan }} </span> akan dihapus
                            </p>
                            <div class="">
                                <form x-ref="content" action="{{ route('jurusan.destroy', $item->id_jurusan) }}" method="POST"
                                    class=" grid grid-cols-7 gap-x-2 py-2">
                               
                                        @csrf
                                        @method('DELETE')

                                    


                                    <button type="button"
                                        class="block col-span-4 py-2 px-6  rounded-md font-semibold text-white  bg-gray-500 "
                                        @click="modalOpen=false">cancle</button>
                                    <button type="submit"
                                        class="block col-span-3 rounded-md px-6  font-semibold text-white  bg-rose-400">
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








    {{-- <a  class="block w-full" href="{{ route('dataAlumni') }}"><img class="mx-auto" --}}
    {{-- src="{{ asset('assets/keluar.svg') }}" alt="keluar" /></a> --}}





