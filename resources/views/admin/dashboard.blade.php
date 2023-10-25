<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

@extends('template.admin.master')

@section('konten')
    <section class="bg-[#eee]/20 grid  grid-col-2 md:grid-cols-12 px-[30px] box-border py-5 min-h-[1000px]">
        <div class="md:col-span-2 relative hidden md:block">
            @include('template.admin.sidebar')
        </div>
        <div class="md:col-span-10 md:mr-10">
            @include('template.admin.header')
            <div class="mt-20 ">
                @include('admin.dashboard_components.total')
            </div>

            <h1 class="text-[20px] font-semibold mt-20">Alumni yang Terdaftar</h1>
            <div class="grid grid-cols-1 lg:gap-x-2 gap-y-5 lg:gap-y-0 lg:grid-cols-2 mt-5">

                <div class="w-full h-full bg-white rounded-[10px] shadow-md p-3">
                    @include('admin.dashboard_components.chart_alumni_terdaftar')
                </div>
                <div class="w-full h-full bg-white rounded-[10px] shadow-md p-3">
                    @include('admin.dashboard_components.bar_alumni_terdaftar')
                </div>

            </div>
        </div>


    </section>
@endsection
