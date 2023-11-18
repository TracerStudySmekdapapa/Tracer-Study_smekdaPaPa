<div class="fixed">

    <div class="flex flex-col items-center justify-center space-y-4">
        <div><svg xmlns="http://www.w3.org/2000/svg" width="37" height="9" viewBox="0 0 37 9" fill="none">
                <circle cx="4.5" cy="4.5" r="4.5" fill="#FF0000" />
                <circle cx="18.5" cy="4.5" r="4.5" fill="#05FF00" />
                <circle cx="32.5" cy="4.5" r="4.5" fill="#FFE600" />
            </svg>
        </div>
        <div class="min-h-[90vh] w-[80px] bg-primary rounded-[20px] text-white  uppercase">
            <div class="h-[90vh] w-full   flex flex-col justify-between items-center py-10">
                <div>
                    <h1 class="text-[14px] font-semibold">admin</h1>
                    <div class="flex flex-col items-center justify-center mt-10 space-y-8">
                        <span>
                            @include('template.admin.components.dashboard')
                        </span>
                        <span>
                            @include('template.admin.components.verifikasi')
                        </span>
                        <span>
                            @include('template.admin.components.alumni_menu')
                        </span>
                        <span>
                            @include('template.admin.components.jurusan')
                        </span>
                        <span>
                            @include('template.admin.components.survei')
                        </span>
                    </div>
                </div>
                <div>
                    <div>
                        @include('template.admin.components.logout')
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
