{{-- @dd(Auth::user()->profil_picture) --}}
<div class="max-w-[250px] px-3 mx-10  hidden md:block">
    <div x-data="{
        dropdownOpen: false,
    }" class="relative">
        <button @click="dropdownOpen=true"
            class="flex items-center justify-center text-base font-medium transition-colors p-px bg-white rounded-full  after:content-['']  after:bg-[#00F50A] after:absolute after:w-[11px] after:h-[11px] after:bottom-0 after:right-0 border border-primary after:rounded-full relative after:z-50">
            @if (Auth::user()->hasRole('Admin'))
                <img src="{{ asset('assets/blank.jpg') }}" class="object-cover border rounded-full w-9 h-9" />
            @else
                <img src="{{ Auth::user()->profil_picture ? asset('assets/random/' . Auth::user()->profil_picture) : asset('assets/blank.jpg') }}"
                    class="object-cover border rounded-full w-9 h-9" />
            @endif
        </button>
        {{-- <img src="{{}}" /> --}}
        <div x-show="dropdownOpen" @click.away="dropdownOpen=false"
            class="absolute top-0 z-[99999] w-56 mt-12 -translate-x-1/2 left-1/2" x-cloak>
            <div
                class="p-1 mt-1  bg-white h-full pb-1 overflow-hidden border rounded-md shadow-lg border-neutral-200/70 text-neutral-700">
                <div class="px-2 py-1.5 text-sm font-semibold">{{ Str::ucfirst(Auth::user()->name) }}</div>


                <div class="h-px my-1 -mx-1 bg-neutral-200"></div>



                <a href="{{ Auth::user()->hasRole('Admin') ? route('adminDashboard') : route('dashboard') }}"
                    class="hover:bg-neutral-100 relative flex cursor-default select-none hover:bg-nature-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-4 h-4 mr-2">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span class="cursor-pointer">Dashboard</span>
                </a>

                <a href="{{ route('profile.edit') }}"
                    class="cursor-pointer relative flex  select-none hover:bg-neutral-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-4 h-4 mr-2">
                        <path
                            d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z">
                        </path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    <span class="cursor-pointer">Settings</span>
                </a>

                <div class="h-px my-1 -mx-1 bg-neutral-200"></div>

                <div
                    class="relative hover:bg-neutral-100 py-1   cursor-pointer select-none    items-center rounded px-2  text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" href="{{ route('logout') }}" class="flex items-center  pr-5  ">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" x2="9" y1="12" y2="12"></line>
                                </svg>
                            </span>
                            <span>Log Out</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
