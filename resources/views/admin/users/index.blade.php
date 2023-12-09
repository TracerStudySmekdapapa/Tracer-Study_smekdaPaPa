<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>


@extends('template.admin.master')

@section('konten')
    <section class="bg-[#eee]/20 grid  grid-col-2 md:grid-cols-12 px-[30px] box-border py-5 min-h-[1000px]">
        <div class="relative hidden md:col-span-2 md:block">
            @include('template.admin.sidebar')
        </div>
        <div class="md:col-span-10 md:mr-10">
            @include('template.admin.header')


            <div class="flex items-center justify-end mt-20 ">
                <div class="flex justify-center align-bottom ">
                    <form action="{{ route('dataAlumni') }}" method="get" id="form_search"
                        class="grid-flow-col-dense mt-4 md:grid gap-x-2 ">
                        <input id="input_search"
                            class="relative z-[23] block  min-w-[290px] max-w-[300px]  text-sm border border-gray-500 pl-5 w-full pr-12 py-2 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Cari Berdasarkan Nama / NISN" type="text" name="search" value="" />
                    </form>
                </div>
            </div>
            <div class="overflow-x-auto lg:overflow-visible">
                <table
                    class="relative z-20 rounded-lg bg-primary/5 min-w-[800px]  w-full  mt-6 overflow-x-scroll lg:overflow-x-hidden">
                    <thead class="relative overflow-hidden bg-transparent rounded-full">

                        <tr class="relative rounded-full overflow-hidden h-[50px] px-[50px] capitalize ">
                            <th>No</th>
                            <th>
                                Nama
                            </th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center divide-x">

                        @foreach ($data as $index => $item)
                            <tr class="divide-x bg-gray-50">
                                <td>{{ $index + 1 }}</td>
                                <td class="px-4 py-4 text-left">
                                    {{ $item->name }}
                                </td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    @if (!empty($item->getRoleNames()))
                                        @foreach ($item->getRoleNames() as $v)
                                            <label class="badge badge-success">{{ $v }}</label>
                                        @endforeach
                                    @endif

                                </td>
                                <td>
                                    <div class="flex items-center justify-center space-x-2">

                                        <a href="{{ route('editUsers', $item->id_user) }}"
                                            class="inline-block px-4 py-2 text-xs font-medium text-white bg-indigo-600 rounded hover:bg-indigo-700">
                                            <img src="{{ asset('assets/jurusan-edit.svg') }}" alt="edit icon">
                                        </a>

                                        <div>
                                            @include('admin.users.deleteAlert.index')
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                    <tfoot class="">
                        <tr>
                            <td class="px-5 py-1" colspan="8">{{ $data->links() }}
                            </td>
                        </tr>
                    </tfoot>

                </table>
            </div>

            <div class="my-2 text-base">
                <h1>Jumlah : {{ $dataCount }} orang</h1>
            </div>

        </div>


    </section>
@endsection
