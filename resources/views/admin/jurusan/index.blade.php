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

                    <a class="btn btn-success" href="{{ route('jurusan.create') }}"> Create New Data</a>
                    {{-- ! end title --}}

                    {{-- ? ==========table  --}}
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900">


                                    <table class="table table-bordered">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jurusan</th>

                                            <th width="280px">Action</th>
                                        </tr>
                                        @foreach ($jurusan as $item)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $item->nama_jurusan }}</td>
                                                <td>
                                                    <form action="{{ route('jurusan.destroy', $item->id_jurusan) }}"
                                                        method="POST">

                                                        <a href="{{ route('jurusan.show', $item->id_jurusan) }}">Show</a>

                                                        <a href="{{ route('jurusan.edit', $item->id_jurusan) }}">Edit</a>

                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        @endsection
