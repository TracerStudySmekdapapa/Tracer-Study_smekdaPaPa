<div x-data="{ 
    activeAccordion: '', 
    setActiveAccordion(id) { 
        this.activeAccordion = (this.activeAccordion == id) ? '' : id 
    } 
}" class="relative w-full mx-auto overflow-hidden text-sm font-normal">
<div x-data="{ id: $id('accordion') }" class="cursor-pointer group">
    <button @click="setActiveAccordion(id)" class="flex items-center justify-center w-full p-0 text-left select-none group-hover:underline">
        <span><img src="{{ asset('assets/survey_sidebar.svg') }}" alt=""></span>
        
    </button>
    <div x-show="activeAccordion==id" x-collapse x-cloak>
        <div class="p-0 pt-4 opacity-70 text-center grid place-items-center">
           <a href="{{ route('survei') }}" class="text-[10px]">survei</a>
        </div>
        <div class="p-0 pt-4 opacity-70 text-center grid place-items-center">
            <a href="{{ route('dataSurvei') }}" class="text-[10px]">data</a>
        </div>
    </div>
</div>


</div>