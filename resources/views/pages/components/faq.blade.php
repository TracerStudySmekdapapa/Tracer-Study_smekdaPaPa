<div id="faq" x-data="{
    activeAccordion: '',
    setActiveAccordion(id) {
        this.activeAccordion = (this.activeAccordion == id) ? '' : id
    }
}" class="relative w-full max-w-3xl py-5 mx-auto mt-12 text-base">
    <h1 class="py-6 text-[#2525255] text-[20px] font-semibold">FAQ ?</h1>
    <div x-data="{ id: $id('accordion') }"
        :class="{
            'border-neutral-200/60 text-neutral-800': activeAccordion ==
                id,
            'border-transparent text-neutral-600 hover:text-neutral-800': activeAccordion != id
        }"
        class="duration-200 ease-out bg-white border rounded-md cursor-pointer group" x-cloak>
        <button @click="setActiveAccordion(id)"
            class="flex items-center justify-between w-full px-5 py-4 font-semibold text-left select-none">
            <span>Apa itu Tracer Studi ?</span>
            <div :class="{ 'rotate-90': activeAccordion == id }"
                class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-out">
                <div class="absolute w-0.5 h-full bg-neutral-500 group-hover:bg-neutral-800 rounded-full"></div>
                <div :class="{ 'rotate-90': activeAccordion == id }"
                    class="absolute w-full h-0.5 ease duration-500 bg-neutral-500 group-hover:bg-neutral-800 rounded-full">
                </div>
            </div>
        </button>
        <div x-show="activeAccordion==id" x-collapse x-cloak>
            <div class="p-5 pt-0 opacity-70">
                Tracer study adalah studi pelacakan jejak lulusan perguruan tinggi
                yang dilakukan untuk mengetahui hasil pendidikan yang telah
                diterima oleh lulusan.
            </div>
        </div>
    </div>
    <div x-data="{ id: $id('accordion') }"
        :class="{
            'border-neutral-200/60 text-neutral-800': activeAccordion ==
                id,
            'border-transparent text-neutral-600 hover:text-neutral-800': activeAccordion != id
        }"
        class="duration-200 ease-out bg-white border rounded-md cursor-pointer group" x-cloak>
        <button @click="setActiveAccordion(id)"
            class="flex items-center justify-between w-full px-5 py-4 font-semibold text-left select-none">
            <span>Apa fungsi dari Tracer Study?</span>
            <div :class="{ 'rotate-90': activeAccordion == id }"
                class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-out">
                <div class="absolute w-0.5 h-full bg-neutral-500 group-hover:bg-neutral-800 rounded-full"></div>
                <div :class="{ 'rotate-90': activeAccordion == id }"
                    class="absolute w-full h-0.5 ease duration-500 bg-neutral-500 group-hover:bg-neutral-800 rounded-full">
                </div>
            </div>
        </button>
        <div x-show="activeAccordion==id" x-collapse x-cloak>
            <div class="p-5 pt-0 opacity-70">
                untuk menilai relevansi lulusan perguruan tinggi dengan dunia
                kerja. Tracer studi dilakukan dengan mengumpulkan data dari alumni
                perguruan tinggi, seperti jenis pekerjaan yang ditekuni, tingkat
                kepuasan terhadap pekerjaan, dan kompetensi yang dibutuhkan di
                dunia kerja.
            </div>
        </div>
    </div>
    <div x-data="{ id: $id('accordion') }"
        :class="{
            'border-neutral-200/60 text-neutral-800': activeAccordion ==
                id,
            'border-transparent text-neutral-600 hover:text-neutral-800': activeAccordion != id
        }"
        class="duration-200 ease-out bg-white border rounded-md cursor-pointer group" x-cloak>
        <button @click="setActiveAccordion(id)"
            class="flex items-center justify-between w-full px-5 py-4 font-semibold text-left select-none">
            <span>Apakah perlu mengisi tracer study ?</span>
            <div :class="{ 'rotate-90': activeAccordion == id }"
                class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-out">
                <div class="absolute w-0.5 h-full bg-neutral-500 group-hover:bg-neutral-800 rounded-full"></div>
                <div :class="{ 'rotate-90': activeAccordion == id }"
                    class="absolute w-full h-0.5 ease duration-500 bg-neutral-500 group-hover:bg-neutral-800 rounded-full">
                </div>
            </div>
        </button>
        <div x-show="activeAccordion==id" x-collapse x-cloak>
            <div class="p-5 pt-0 opacity-70">
                Iya , Data-data yang dikumpulkan digunakan untuk menilai apakah
                kurikulum dan proses pembelajaran di perguruan tinggi sudah sesuai
                dengan kebutuhan dunia kerja.
            </div>
        </div>
    </div>
</div>