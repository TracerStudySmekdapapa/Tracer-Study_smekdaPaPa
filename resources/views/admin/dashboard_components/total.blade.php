    @php
        $data = [1, 2, 3, 4, 5, 6];
        $total = [$alumniData['countAlumniMendaftar'], $alumniData['countAlumni'], $alumniData['countPekerjaan'], $alumniData['countPendidikan'], $alumniData['countAlumniFreshGraduate'], $alumniData['countAlumniSurvei']];
        $text = ['Total  Mendaftar', 'Telah Deferivikasi', 'Telah Bekerja', 'Melanjutkan Pendidikan', 'Fresh Graduate', 'Alumni mengisi survei'];
        $img = ['admin_re', 'admin_verif', 'admin_bekerja', 'admin_book', 'admin_pendidikan', 'admin_pendidikan'];
    @endphp


    <h1 class=" relative font-semibold text-[20px] capitalize my-2">
        Data Alumni</h1>
    <div class="grid grid-cols-2 gap-2 ">
        <div class="w-full h-full bg-red-500">

        </div>
        <div class="grid grid-cols-2 gap-2 lg:gap-8 lg:grid-cols-3 justify-stretch ">

            @foreach ($data as $index => $item)
                <div class=" bg-white shadow-lg rounded-[5px] min-h-[100px] max-h-[120px]  flex flex-col px-5 py-2.5">

                    <div class="flex  flex-col justify-center items-center">
                        {{-- <img src="{{ asset('assets/' . $img[$index] . '.svg') }}" alt="" class="p-5 "> --}}
                        <div class="flex flex-col justify-center mx-4 -mt-1 space-y-0">
                            <h1 class=" font-bold text-[30px]  font-montserrat">{{ $total[$index] }}</h1>
                            <p class="text-[14px] text-black/60 font-normal">{{ $text[$index] }}</p>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
