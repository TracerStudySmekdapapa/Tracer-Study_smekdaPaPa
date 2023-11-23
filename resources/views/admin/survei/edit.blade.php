@extends('template.admin.master')

@section('konten')
    <section class=" bg-[#eee]/20 grid  grid-col-2 md:grid-cols-12 px-[30px] box-border py-5 ">
        <div class="md:col-span-2 relative hidden md:block">
            @include('template.admin.sidebar')
        </div>
        <div class="md:col-span-10 md:mr-10">
            @include('template.admin.header')
            <div class="overflow-x-auto lg:overflow-visible  mt-20">

                @csrf

                <div class="container">
                    <form action="{{ route('updateSurvei', $survei->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <table class="w-full ">
                            <tr>
                                <td>
                                    <strong>Pertanyaan</strong>
                                </td>
                                <td>: </td>
                                <td>
                                    <input type="text" name="pertanyaan" value="{{ $survei->pertanyaan }}"
                                        class="pl-5 min-w-[400px] py-2 border-gray-200 rounded-lg ml-10"
                                        placeholder="Pertanyaan">
                                </td>
                            </tr>
                            <tr class="">
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="submit"
                                        class="mt-5 ml-10 px-10 py-2 bg-blue-500 hover:bg-black  text-white font-semibold rounded-md block">
                                        Edit Pertanyaan</button>
                                </td>
                            </tr>
                        </table>
                    </form>

                </div>

                </form>

            </div>

        </div>


    </section>
@endsection
