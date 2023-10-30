@extends('template.master')
@section('content')
    <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-20 -left-32 z-0"></div>
    <div class="w-[130px] h-[130px] bg-primary blur-[100px] absolute top-80 -right-52 z-0"></div>
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




    </main>
    @include('template.utils.footer')
@endsection
