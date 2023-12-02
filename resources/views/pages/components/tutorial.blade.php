@php
    // $title_card = ['Registrasi' , 'Tambah Data Pribadi' , 'Menunggu Verifikasi' , 'Mengisi Data Pekerjaan (opsional)' , 'Mengisi Data Pendidikan (opsional)']
    $angka = [0, 1, 2];
    $gambar = ['register', 'add', 'validasi'];
    $title_card = ['Registrasi', 'Tambah Data Pribadi', 'Menunggu Verifikasi'];
    $desk_card = ['Melakukan registrasi terlebih dahulu agar terdaftar dan bisa melanjutkan proses selanjutnya', 'Menambahkan data pribadi, agar admin dapat melakukan validasi dengan data yag diberikan tersebut', 'Menunggu admin melakukan verifikasi dengan melakukan beberapa pengecekan dari data pribadi yang diberikan'];

@endphp


<div class="mt-[100px] md:px-10 lg:px-16">
    <h1 class="  text-[#2525255] px-10 text-[20px] font-semibold">Tutorial</h1>
    <section id="tutorial" class="py-6  overflow-x-scroll lg:overflow-x-hidden">
        <div class="main__tutorial">
            <!-- todo  card-1 -->

            @foreach ($angka as $item)
                <div class="card " style="user-select: none">
                    <div class="card__header">
                        <div class="card___icon">
                            <img src="{{ asset('assets/' . $gambar[$item] . '.svg') }}" alt="" />
                        </div>
                        <h1 class="card__title">{{ $title_card[$item] }}</h1>
                    </div>
                    <div class="card__body">
                        {{ $desk_card[$item] }}
                    </div>
                </div>
            @endforeach
            <!-- todo card--->


        </div>

    </section>
</div>
<a href="/tutorial"
    class="text-center block mt-11 mx-auto capitalize font-normal text-blue-600 border-b w-[200px] pb-2 border-blue-600">baca
    selengkapnya
</a>
