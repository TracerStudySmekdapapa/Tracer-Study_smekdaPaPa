<section class="lg:px-10 max-w-full xl:max-w-[70%] grid place-items-center mx-auto md:mt-[100px]">
    <div class="grid w-full grid-cols-1  gap-y-5 md:gap-y-0 md:grid-cols-3 lg:gap-x-5 place-items-center">
        <div class="counter_contain">
            <h1 class="counter_title -mb-3">{{ $counterData['alumniTerverif'] }}+</h1>
            <p class="counter_desk ">Alumni Terverifikasi</p>
        </div>

        <div class="counter_contain">
            <h1 class="counter_title -mb-3">{{ $counterData['alumniBekerja'] }}+</h1>
            <p class="counter_desk">telah bekerja</p>
        </div>

        <div class="counter_contain">
            <h1 class="counter_title -mb-3">{{ $counterData['alumniPendidikan'] }}+</h1>
            <p class="counter_desk">Melanjutkan Pendidikan</p>
        </div>
    </div>
</section>
