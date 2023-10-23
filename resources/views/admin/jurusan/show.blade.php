@extends('template.admin.master')

@section('konten')
    <div class="flex h-screen bg-gray-0 dark:bg-gray-900 " :class="{ 'overflow-hidden': isSideMenuOpen }">



        {{-- ? sidebar --}}
        @include('template.admin.sidebar')
        {{-- end sidebar --}}


        <div class="flex flex-col flex-1 w-full">

            {{-- ? ===================header --}}
            @include('template.admin.header')
            {{-- ! =================== end header --}}




            <main class="h-full  " style="padding: 0 0;">
                <div class="container px-6 mx-auto grid">

                    {{-- ? title page --}}
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Dashboard
                    </h2>
                    {{-- ! end title --}}

                    {{-- ? ==========table  --}}
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 bg-white  text-gray-900">
                                    <div class="">
                                        <label for="">Nama Jurusan</label>
                                        <input type="text" name="nama_jurusan" value="{{ $jurusan->nama_jurusan }}">
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    {{-- ! ==========Cards total --}}



                </div>
            </main>
        </div>
    </div>
@endsection
