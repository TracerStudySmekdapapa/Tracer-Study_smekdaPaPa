<div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen=false" class="relative z-50 w-auto h-auto">

    <div @click="modalOpen=true" class="py-1.5
    bg-rose-500 w-full rounded-md block cursor-pointer ">Tolak</div>

    <template x-teleport="body">
        <div x-show="modalOpen" class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen"
            x-cloak>
            <div x-show="modalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-300"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="modalOpen=false"
                class="absolute inset-0 w-full h-full bg-black bg-opacity-40"></div>
            <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="relative w-full py-6 bg-white px-7 sm:max-w-lg sm:rounded-lg">
                <div class="flex items-center justify-between pb-2">
                    <h3 class="text-lg font-semibold">Penolakan Terhadap </h3>
                    <button @click="modalOpen=false"
                        class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="relative ">
                    <div class="">

                        <p>Tolak alumni dengan nama <span class="font-semibold text-rose-500">
                                {{ $item->name }}</span> ?</p>



                        <div class="grid w-full grid-cols-3 mt-3 place-items-center gap-x-3 ">
                            <button type="button" @click="modalOpen=false"
                                class="block w-full col-span-2 py-2 font-semibold text-center text-white bg-gray-500 rounded-sm">Batal</button>
                            <form action="{{ route('tolakVerifAlumni', $item->id_user) }}" method="POST"
                                class=" bg-rose-500 grid place-items-center w-full h-full mt-3.5 max-h-[40px] overflow-hidden rounded-sm">
                                @csrf
                                <button type="submit"
                                    class="block w-full font-semibold text-center text-white rounded-sm  bg-rose-500">Tolak</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
    </template>
</div>
