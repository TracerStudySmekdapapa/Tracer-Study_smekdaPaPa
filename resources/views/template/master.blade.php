<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tracer Study Smekda - {{ $title }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/smknicon.png') }}" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
