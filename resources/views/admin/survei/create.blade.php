@extends('template.admin.master')

@section('konten')
    <section class=" bg-[#eee]/20 grid  grid-col-2 md:grid-cols-12 px-[30px] box-border py-5 ">
        <div class="relative hidden md:col-span-2 md:block">
            @include('template.admin.sidebar')
        </div>
        <div class="md:col-span-10 md:mr-10">
            @include('template.admin.header')
            <div class="mt-20 overflow-x-auto lg:overflow-visible">

                <form action="{{ route('simpanPertanyaanSurvei') }}" method="post">
                    @csrf

                    <div class="container">
                        <table class="w-full ">
                            <tr>
                                <td>
                                    <strong>Pertanyaan Baru</strong>
                                </td>
                                <td>: </td>
                                <td>
                                    <input type="text" name="nama_pertanyaan"
                                        class="pl-5 min-w-[400px] py-2 border-gray-200 rounded-lg ml-10"
                                        placeholder="Pertanyaan">

                                    <!-- error -->
                                    @error('nama_pertanyaan')
                                        <p class="mt-1 text-rose-500">{{ $message }}</p>
                                    @enderror
                                    <!-- error -->
                                </td>
                            </tr>
                            <tr class="">
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="submit"
                                        class="block px-10 py-2 mt-5 ml-10 font-semibold text-white bg-blue-500 rounded-md hover:bg-black">Buat
                                        Pertanyaan Baru</button>
                                </td>
                            </tr>
                </form>
            </div>
            </table>


            </form>

        </div>

        </div>


    </section>
@endsection
