@extends('template.master')
@section('content')
    <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-20 -left-32 z-0"></div>
    <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-80 -right-52 z-0 hidden lg:block "></div>
    <main>
        @include('template.utils.navbar')




        <!-- ? section-hero ======== -->
        @include('pages.components.heroSection')
        <!-- ! section-hero ======== -->

        <!-- ?counter  -->
        @include('pages.components.counterAlumni')
        <!-- !counter  -->

        <!-- ? about ================== -->
        @include('pages.components.aboutTracerStudy')
        <!-- ! about ================== -->

        <!-- ? tutorial ================== -->
        @include('pages.components.tutorial')
        <!-- ! tutorial ================== -->

        <!-- ?faq -->
        @include('pages.components.faq')
        <!-- !faq -->

        <!-- ?CTA -->
        @include('pages.components.cta')
        <!-- !CTA -->


        {{-- testimonial --}}
        @include('pages.components.testimonial')
        {{-- testimonial --}}



    </main>
    {{-- footer --}}
    @include('template.utils.footer')
    {{-- footer --}}
@endsection
