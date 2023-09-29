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
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    @if ($message = Session::get('message'))
                                        <h1>{{ $message }}</h1>
                                    @endif
                                    <table class="table-fixed w-full text-center">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>NISN</th>
                                                <th>Angkatan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @forelse ($user as $data)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $data->name }}</td>
                                                    <td>{{ $data->nisn }}</td>
                                                    <td>{{ $data->angkatan }}</td>
                                                    <td>
                                                        <form action="{{ route('verifalumniStore', $data->id_user) }}"
                                                            method="POST">
                                                            @csrf

                                                            <button
                                                                formaction="{{ route('tolakVerifAlumni', $data->id_user) }}">tolak</button>
                                                            <button type="submit">veriaf</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <th colspan="5">Tidak ada data</th>
                                                </tr>
                                            @endforelse
                                        </tbody>

                                    </table>
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
