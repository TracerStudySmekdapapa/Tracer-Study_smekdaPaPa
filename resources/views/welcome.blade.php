@extends('template.master')
@section('content')
    <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-20 -left-32 z-0"></div>
    <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-80 -right-52 z-0"></div>
    <main>
        @include('template.utils.navbar')
    </main>
    @include('template.utils.footer')
@endsection
