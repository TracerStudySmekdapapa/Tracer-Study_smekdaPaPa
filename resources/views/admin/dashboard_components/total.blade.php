    @php
        $data = [1, 2, 3, 4, 5];
        $total = [$alumniData['countAlumniMendaftar'], $alumniData['countAlumni'], $alumniData['countPekerjaan'], $alumniData['countPendidikan'], $alumniData['countAlumniFreshGraduate']];
        $text = ['Alumni Yang Telah Mendaftar', 'Alumni  Yang Telah Deferivikasi', 'Alumni yang telah bekerja ', 'Alumni melanjutkan pendidikan', 'Fresh Graduate'];
        $img = ['admin_re', 'admin_verif', 'admin_bekerja', 'admin_book', 'admin_pendidikan'];
    @endphp






    <div class="grid grid-cols-2 lg:grid-cols-5 place-items-center">


        @foreach ($data as $index => $item)
            <div
                class=" bg-white shadow-lg rounded-[10px] max-w-[207px] min-w-[200px] min-h-[125px] max-h-[128px]  flex flex-col px-5 py-2.5">
                <div class="flex flex-col space-y-3 ">
                    <div class=" flex  justify-start items-center">
                        <img src="{{ asset('assets/' . $img[$index] . '.svg') }}" alt="">
                        <h1 class="ml-4 font-bold text-[30px] mt-1 font-montserrat">{{ $total[$index] }}</h1>
                    </div>
                    <p class="text-[14px] text-black/60 font-normal">{{ $text[$index] }}</p>
                </div>
            </div>
        @endforeach

    </div>
