




 
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
                                        <form action="{{ route('simpanDataPendidikan', Auth::user()->id_user) }}" method="POST">
                                            @csrf
                                            <div class="">
                                                <label for="">Nama Universitas</label>
                                                <input type="text" name="nama_univ">
                                            </div>
                                            <div class="">
                                                <label for="">Fakultas</label>
                                                <input type="text" name="fakultas">
                                            </div>
                                            <div class="">
                                                <label for="">Prodi</label>
                                                <input type="text" name="prodi">
                                            </div>
                                            <div class="">
                                                <label for="">Alamat Universitas</label>
                                                <input type="text" name="alm_univ">
                                            </div>
                                            <button type="submit">Simpan</button>
                                        </form>
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
    