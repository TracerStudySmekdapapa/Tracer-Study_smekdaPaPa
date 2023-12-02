@php
    $counting = [0, 1, 2, 3, 4, 5, 6];
    $img_icon = ['register', 'add', 'validasi', 'bekerja_black', 'pendidikan_black', 'cari', 'survey_sidebar_black'];
    $title_card_full = ['Registrasi', 'Tambah Data Pribadi', 'Menunggu Verifikasi', 'Mengisi Data Pekerjaan', 'Mengisi Data Pendidikan', 'Melakukan pencarian data', 'Mengisi survey'];
    $desk_card_full = [
        'Melakukan registrasi terlebih dahulu agar terdaftar dan bisa melanjutkan selanjutnya',

        'Menambahkan data pribadi, agar admin dapat melakukan validasi dengan data yag diberikan tersebut',

        'Menunggu admin melakukan verifikasi dengan melakukan beberapa pengecekan dari data pribadi yang diberikan',

        'Mengisi data pekerjaan jika alumni tersebut melanjutkan / pernah masuk ke dunia pekerjaan yang lebih profesioanl',

        'Mengisi data pendidikan jika alumni tersebut melanjutkan / pernah melanjutkan ke dunia perguruan tinggi ',

        'Melakukan pencarian data , dan melihat apakah datanya sudah bisa di temukan / dilihat oleh semua orang  
     ',

        'Melakukan pengisian survey agar kami dapat mempertimbangkan kualitas pendidikan di masa mendatang ',
    ];

@endphp




@extends('template.master')
@section('content')
    <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-20 -left-32 z-0"></div>
    <div class="hidden md:block w-[130px] h-[130px] bg-primary blur-[100px] absolute top-80 -right-52 z-0"></div>
    <main>
        @include('template.utils.navbar')

        <section
            class="w-[85%]  justify-items-center  mx-auto place-items-center  grid grid-cols-1 md:grid-cols-2  gap-10 md:gap-12   lg:mt-10 xl:mt-16  xl:grid-cols-3 
            
            
            border-l-2 border-gray-600 pl-7 md:border-0 md:pl-0
            ">


            @foreach ($counting as $item)
                <div class="card  relative">
                    <div
                        class="w-[30px] h-[30px] grid place-items-center absolute -top-2.5  -left-11 md:-left-2.5 text-white bg-primary rounded-full z-40">
                        {{ $item + 1 }}
                    </div>
                    <div class="card__header">
                        <div class="card___icon">
                            <img src="{{ asset('assets/' . $img_icon[$item] . '.svg') }}" alt="gagal"
                                class="relative z-50 w-[50px]" />
                        </div>
                        <h1 class="card__title capitalize">{{ $title_card_full[$item] }}</h1>
                    </div>
                    <div class="card__body">
                        {{ $desk_card_full[$item] }}
                    </div>
                </div>
            @endforeach

        </section>



    </main>
    @include('template.utils.footer')
@endsection
