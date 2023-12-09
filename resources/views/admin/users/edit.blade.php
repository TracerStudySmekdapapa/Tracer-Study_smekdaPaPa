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
                    <form action="{{ route('updateUsers', $data->id_user) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <table class="w-full">
                            <tr>
                                <td>
                                    <strong>Nama</strong>
                                </td>
                                <td>: </td>
                                <td>
                                    <input type="text" name="name" value="{{ $data->name }}"
                                        class="pl-5 min-w-[400px] py-2 border-gray-200 rounded-lg ml-10">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Email</strong>
                                </td>
                                <td>: </td>
                                <td>
                                    <input type="text" name="email" value="{{ $data->email }}"
                                        class="pl-5 min-w-[400px] py-2 border-gray-200 rounded-lg ml-10">
                                </td>
                            </tr>
                            <tr> 
                                <td>
                                    <strong>Role</strong>
                                </td>
                                <td>: </td>
                                <td>
                                    <div class="relative">
                                        <select name="roles[]" id="roles" class="form-select pl-5 min-w-[400px] py-2 border-gray-200 rounded-lg ml-10" >
                                            @foreach($roles as $role)
                                                <option value="{{ $role }}" {{ in_array($role, $userRole) ? 'selected' : '' }}>{{ $role }}</option>
                                            @endforeach
                                        </select>
                                    </div>                             
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Password</strong>
                                </td>
                                <td>: </td>
                                <td>
                                        <div class="relative">
                                        <label class="text-sm relative">
                                            <input type="password" name="password" id="password" placeholder="Masukkan Password Baru"
                                                   class="pl-5 min-w-[400px] py-2 border-gray-200 rounded-lg ml-10 relative">
                                    
                                            <span class="absolute inset-y-0 right-2 flex items-center cursor-pointer" id="showPassword"
                                                  id="showPassword" onclick="togglePasswordVisibility()">
                                                <span id="eye-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                              d="M12 9a3 3 0 0 1 3 3a3 3 0 0 1-3 3a3 3 0 0 1-3-3a3 3 0 0 1 3-3m0-4.5c5 0 9.27 3.11 11 7.5c-1.73 4.39-6 7.5-11 7.5S2.73 16.39 1 12c1.73-4.39 6-7.5 11-7.5M3.18 12a9.821 9.821 0 0 0 17.64 0a9.821 9.821 0 0 0-17.64 0Z"/>
                                                    </svg>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                </  td>                                
                            </tr>
                            <tr class="">
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="submit"
                                        class="mt-5 ml-10 px-10 py-2 bg-blue-500 hover:bg-black  text-white font-semibold rounded-md block">
                                        Edit Data Users</button>
                                </td>
                            </tr>
                        </table>
                    </form>

                </div>

                </form>

            </div>

        </div>

        <script>
            function togglePasswordVisibility() {
                var passwordInput = document.getElementById('password');
                var eyeIcon = document.getElementById('eye-icon');
        
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    eyeIcon.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">' +
                        '<path fill="currentColor" d="M12 4C7.03 4 2.81 7.78 1 12s5.03 8 11 8s9-3.78 10.77-8s-5.03-8-11-8M12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4s4 1.79 4 4s-1.79 4-4 4m0-7c-1.11 0-2 .89-2 2s.89 2 2 2s2-.89 2-2s-.89-2-2-2"></path></svg>';
                } else {
                    passwordInput.type = 'password';
                    eyeIcon.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">' +
                        '<path fill="currentColor" d="M12 9a3 3 0 0 1 3 3a3 3 0 0 1-3 3a3 3 0 0 1-3-3a3 3 0 0 1 3-3m0-4.5c5 0 9.27 3.11 11 7.5c-1.73 4.39-6 7.5-11 7.5S2.73 16.39 1 12c1.73-4.39 6-7.5 11-7.5M3.18 12a9.821 9.821 0 0 0 17.64 0a9.821 9.821 0 0 0-17.64 0Z"></path></svg>';
                }
            }
        </script>
        
    </section>
@endsection
