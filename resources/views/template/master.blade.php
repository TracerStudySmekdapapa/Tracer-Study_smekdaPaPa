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

<body x-data class="relative overflow-x-hidden ">
    @yield('content')
</body>

</html>
