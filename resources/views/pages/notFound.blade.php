<!DOCTYPE html>
<html class="light" lang="en">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content="Tracer study SMKN 2 Padang Panjang adalah portal informasi yang melacak dan menyajikan perkembangan karier alumni sekolah. Memberikan wawasan tentang pencapaian dan pengalaman alumni, serta memberikan panduan bagi mereka yang mencari informasi terkait pendidikan dan pekerjaan. Dengan fokus pada jejak sukses alumni, website ini menjadi sumber inspirasi bagi siswa dan membantu pemangku kepentingan sekolah memahami dampak pendidikan SMKN 2 Padang Panjang dalam karier profesional.">
    <meta name="keywords"
        content="Tracer study, alumni SMKN 2 Padang Panjang, karier alumni, pendidikan SMKN 2 Padang Panjang, profil alumni, kesuksesan alumni, jejak karier, informasi pekerjaan, pencapaian pendidikan, SMK Negeri 2 Padang Panjang , Padang Panjang, smekda , SMEKDA PAPA , SMEKDA">

    <meta name="robots" content="index, follow">
    <meta name="author" content="Syaid-Alfarishi, Habibie Bayezid Wildan , Rayhan Ramadhan, Kevin Ilham Syahreza ">
    <meta name="og:title" content="Tracer Study SMKN 2 Padang Panjang: Jejak Karier dan Kesuksesan Alumni">
    <meta name="og:description"
        content="Eksplorasi jejak karier dan kesuksesan alumni SMKN 2 Padang Panjang melalui Tracer Study. Dapatkan informasi mengenai pencapaian pendidikan dan perjalanan profesional mereka.">
    <meta name="og:image" content="{{ asset('assets/hero.png') }}">
    <meta name="canonical" href="URL_Halaman">





    <title>Tracer Study Smekda - {{ $title }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/smknicon.png') }}" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')


    <!-- Include the Alpine library on your page -->
    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>

    <!-- Alpine Core -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>





    <style>
        [x-cloak] {
            display: none;
        }
    </style>

</head>

<body x-data class="relative overflow-hidden ">
    <!--?  navigasi ==========-->
    <main class="relative">
        <div class="w-[130px] h-[130px] bg-primary blur-[130px] absolute top-20 -left-32 z-0"></div>
        <div class="w-[130px] h-[130px] bg-orange-500 blur-[130px] absolute top-80 -right-52 z-0"></div>

        @include('template.utils.navbar')
        <!--!  navigasi ==========-->
        <div class="w-full   grid place-items-center mt-[60px] 2xl:mt-[100px]   ">
            <h1 class="relative font-extrabold text-[35px] lg:text-[50px] flex space-x-5 items-center">
                <span>Halaman <span class="bg-gray-200 md:bg-transparent ">Tidak Ditemukan</span> </span>
                <span><img src="{{ asset('assets/bingung.svg') }}" alt=""
                        class="absolute lg:relative lg:right-2 lg:right-0"></span>
                <span class="absolute -top-5 right-16"> <img src="{{ asset('assets/random-line.svg') }}"
                        alt="random line">
                </span>
            </h1>
            <div class="mt-16 relative grid place-items-center">
                <h1 class="font-bold text-base text-slate-500 absolute top-1 left-5 lg:left-3 lg:top-2  z-10">Error</h1>
                <img src="{{ asset('assets/404.svg') }}" alt="404" class="z-50 relative w-[75%] lg:w-full">
            </div>
            <div class="flex space-x-10 justify-around items-center mt-20 w-[80%]">
                <a href=""
                    class="font-semibold underline underline-offset-8 text-primary  flex space-x-3 items-center">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
                        </svg></span>
                    <span class="text-[14px] lg:text-base">
                        Kembali
                    </span>
                </a>
                <a href="/"
                    class="font-semibold bg-primary text-white px-2 py-1 text-[14px] lg:px-5 lg:py-[8px] rounded-md">Pergi
                    Ke Home</a>
            </div>
        </div>

    </main>
    <div
        class="max-w-screen-xl min-w-max  md:absolute -bottom-[500px]  left-0 right-0 flex lg:flex lg:relative lg:bottom-0  translate-y-[150px] lg:translate-y-[69px] 2xl:translate-y-[160px]">
        <div class=" min-w-[50vw] max-w-[75vw] rounded-full aspect-square bg-[#7C2EE0] blur-3xl"></div>
        <div class="min-w-[50vw] max-w-[75vw] rounded-full aspect-square bg-[#DE982E] blur-3xl"></div>
    </div>
    </div>
</body>


</html>
