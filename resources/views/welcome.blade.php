@extends('template.master')
@section('content')
    <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-20 -left-32 z-0"></div>
    <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-80 -right-52 z-0"></div>
    <main>
        @include('template.utils.navbar')


        {{--  <div class="w-full h-full">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15957.32684431253!2d100.35990313423933!3d-0.8948611855434514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sid!4v1696922336823!5m2!1sen!2sid"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div> --}}
    </main>
    @include('template.utils.footer')
@endsection
