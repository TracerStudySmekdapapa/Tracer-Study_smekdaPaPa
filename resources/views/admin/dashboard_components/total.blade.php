    @php
        $data = [1, 2, 3, 4];
        $total = [88, 30, 22, 14];
        $text = ['Alumni Yang Telah Mendaftar', 'Alumni  Yang Telah Deferivikasi', 'Alumni yang telah bekerja ', 'Alumni melanjutkan pendidikan'];
        $img = ['admin_register', 'admin_verif', 'admin_bekerja', 'admin_pendidikan'];
    @endphp








    <div class="grid grid-cols-2 gap-5 lg:grid-cols-4 place-items-center">


        @foreach ($data as $index => $item)
            <div
                class=" bg-white shadow-lg rounded-[20px] max-w-[210px] min-w-[200px] min-h-[190px] max-h-[200px]  flex flex-col p-5">
                <div class="flex flex-col ">
                    <div class="mx-4">
                        <img src="{{ asset('assets/' . $img[$index] . '.svg') }}" alt="">
                    </div>
                    <h1 class="font-bold text-[30px] mt-2 font-montserrat">{{ $total[$index] }}</h1>
                    <p class="text-[14px] text-black/60 font-normal">{{ $text[$index] }}</p>
                </div>
            </div>
        @endforeach

    </div>
