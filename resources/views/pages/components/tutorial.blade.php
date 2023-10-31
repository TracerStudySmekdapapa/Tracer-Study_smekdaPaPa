@php
    // $title_card = ['Registrasi' , 'Tambah Data Pribadi' , 'Menunggu Verifikasi' , 'Mengisi Data Pekerjaan (opsional)' , 'Mengisi Data Pendidikan (opsional)']
    $angka = [0,1,2];
    $gambar = ['register' , 'add' , 'validasi'];
    $title_card = ['Registrasi' , 'Tambah Data Pribadi' , 'Menunggu Verifikasi' ];
    $desk_card = [
        'melakukan registrasi terlebih dahulu agar terdaftar dan bisa melanjutkan proses selanjutnya',
        'menambahkan data pribadi, agar admin dapat melakukan validasi dengan data yag diberikan tersebut',
        'menunggu admin melakukan verifikasi dengan melakukan beberapa pengecekan dari data pribadi yang diberikan'
];

@endphp


<section id="tutorial" class="pt-[50px] lg:pt-[100px] md:px-10 lg:px-16">
    <h1 class="py-6 text-[#2525255] text-[20px] font-semibold">Tutorial</h1>
    <div class="main__tutorial">
        <!-- todo  card-1 -->

        @foreach ($angka as $item)

        <div class="card ">
            <div class="card__header">
                <div class="card___icon">
                    <img src="{{ asset('assets/' . $gambar[$item] . '.svg') }}" alt="" />
                </div>
                <h1 class="card__title">{{$title_card[$item]}}</h1>
            </div>
            <div class="card__body">
                {{$desk_card[$item]}}
            </div>
        </div>
        @endforeach
        <!-- todo card--->


    </div>
        
        <a href="/tutorial"
            class="text-center block mt-11 mx-auto capitalize font-normal text-blue-600 border-b w-[200px] pb-2 border-blue-600">baca
            selengkapnya
        </a>
</section>