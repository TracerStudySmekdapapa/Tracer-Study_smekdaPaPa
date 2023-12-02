<!DOCTYPE html>
<html x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('assets/smknicon.png') }}" type="image/x-icon">

    <title>{{ $title }}</title>




    {{-- ! =========== CDN  ========= --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />


    {{-- ! =======JS LIBRARY ============= --}}

    {{-- ? chart --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


    {{-- ! =========== statick file  ========= --}}
    @vite('resources/css/app.css')
</head>

<body style="padding: 0; margin: 0; box-sizing: border-box;">
    @yield('konten')
</body>
@vite('resources/js/app.js')

</html>
