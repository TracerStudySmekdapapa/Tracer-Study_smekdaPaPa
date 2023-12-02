<section id="about" class="w-full pt-[50px] md:pt-[120px] md:px-5 lg:px-0">
    <div class="main__about">
        <!--  ?eft -->
        <div class="left__item">
            <img src="{{ asset('assets/about.jpg') }}" alt="about" class="w-[90%] md:w-full" />
        </div>

        <!--  right -->
        <div class="right__item">
            <h1 class="text-[30px] md:text-[35px] font-semibold">Tentang Tracer Study</h1>
            <p class="leading-[27px] text-black/80 relative -z-50 text-[15px] md:text-base">
                Tracer study adalah studi pelacakan jejak lulusan perguruan tinggi
                yang dilakukan untuk mengetahui hasil pendidikan yang telah
                diterima oleh lulusan. Studi ini dilakukan dengan mengumpulkan
                data dan informasi dari lulusan, baik secara langsung maupun tidak
                langsung ...
            </p>

            <div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen=false" class="relative z-50 w-auto h-auto">
                <button @click="modalOpen=true"
                    class="px-5 py-2 font-semibold text-white rounded-lg bg-primary btn___signup">
                    Baca Selengkapnya
                </button>

                <!-- todo modal___content -->
                <template x-teleport="main">
                    <div x-show="modalOpen"
                        class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen min-h-screen overflow-y-auto"
                        x-cloak>
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
                            class="relative w-full px-10 py-6 bg-white sm:max-w-2xl sm:rounded-lg">
                            <div class="flex items-center justify-between pb-2">
                                <button @click="modalOpen=false"
                                    class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div @click="modalOpen=false" class="relative w-auto font-normal text-black/80">
                                <p class="text-lg font-semibold">Tujuan tracer study adalah untuk : </p>
                                <ol class="list-disc  text-black/60 text-[14px] max-w-[95%] ">
                                    <li>
                                        Melacak Jejak Alumni: Memantau keberhasilan karier alumni setelah lulus.
                                    </li>
                                    <li>
                                        Evaluasi Program Pendidikan: Menilai efektivitas program pendidikan dalam
                                        menyiapkan mahasiswa untuk dunia kerja.
                                    </li>
                                    <li>
                                        Feedback untuk Peningkatan Kurikulum: Mendapatkan umpan balik langsung dari
                                        alumni untuk meningkatkan relevansi kurikulum.
                                    </li>

                                </ol>
                                <p class="text-lg font-semibold mt-3">
                                    Manfaat Tracer Study:
                                </p>
                                <ul class="list-disc text-black/60 text-[14px] max-w-[95%] ">
                                    <li>Perbaikan Kurikulum: Meningkatkan kurikulum berdasarkan kebutuhan aktual pasar
                                        kerja.</li>
                                    <li>Penyempurnaan Proses Pembelajaran: Menyesuaikan metode pengajaran agar lebih
                                        sesuai dengan tuntutan industri.</li>
                                    <li>Meningkatkan Kualitas Alumni: : Memastikan bahwa alumni memiliki keterampilan
                                        dan pengetahuan yang diperlukan.</li>

                                </ul>

                            </div>
                        </div>
                    </div>
                </template>
                <!--todo modal___content -->
            </div>
        </div>
    </div>
</section>
