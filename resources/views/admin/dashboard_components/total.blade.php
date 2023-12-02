    @php
        $data = [1, 2, 3, 4, 5, 6];
        $total = [$alumniData['countAlumniMendaftar'], $alumniData['countAlumni'], $alumniData['countPekerjaan'], $alumniData['countPendidikan'], $alumniData['countAlumniFreshGraduate'], $alumniData['countAlumniSurvei']];
        $text = ['Total  Mendaftar', 'Telah Deferivikasi', 'Telah Bekerja', 'Melanjutkan Pendidikan', 'Fresh Graduate', 'Alumni mengisi survei'];
        $img = ['admin_re', 'admin_verif', 'admin_bekerja', 'admin_book', 'admin_pendidikan', 'admin_survey'];
    @endphp


    <h1 class=" relative font-semibold text-[20px] capitalize my-2">
        Data Alumni</h1>
    <div class="grid grid-cols-2 gap-2 lg:gap-8 lg:grid-cols-3 justify-start items-center ">
        @foreach ($data as $index => $item)
            <div
                class=" cursor-context-menu transition-all duration-300 bg-white  shadow-lg rounded-[5px] min-h-full  flex flex-col px-5 py-2.5 group/item hover:bg-primary/5 ">
                <div class="flex items-center justify-between ">
                    <div class="flex flex-col justify-center mx-4 -mt-1 ">
                        <h1 class=" font-extrabold bgtext-black/80 text-[25px]   font-montserrat">{{ $total[$index] }}
                        </h1>
                        <p class="text-sm text-black/70 font-normal">{{ $text[$index] }}</p>
                        <p
                            class="text-sm  font-normal w-[80%] py-0.5 bg-gray-300 mt-1   transition-all before:transition-all duration-300 before:duration-300 rounded-lg
                            
                            before:bg-primary before:w-[0%] group-hover/item:before:w-[80%] before:py-0.5 before:rounded-full before:top-0 before:content-[''] before:absolute   relative  
                            ">
                        </p>
                    </div>
                    <div
                        class="p-5 box-border bg-primary transition-all duration-300 group-hover/item:bg-[#252525]  rounded-md min-w-[80px] max-w-[100px] aspect-square 
                        


                        ">
                        <img src="{{ asset('assets/' . $img[$index] . '.svg') }}" alt="" class="">
                    </div>
                </div>

            </div>
        @endforeach

    </div>
