<div class="overflow-hidden overflow-x-auto">
    <div class="flex items-center justify-between mt-10 mb-5">
        <h1 class=" font-semibold text-[20px] capitalize">Data fresh graduate</h1>
        <div class="flex items-start justify-center ">
            <a href="{{ route('exportFreshGraduate') }}"
                class="px-4 py-1 ml-auto text-sm text-white bg-green-600 rounded-md ">Export to .xlsx</a>
        </div>
    </div>
    <table class="min-w-full overflow-hidden text-sm bg-white divide-y-2 divide-gray-200 rounded-lg">

        <thead class="overflow-hidden bg-transparent rounded-full relative ">
            <tr>

                <td class="absolute left-5 top-5 bg-primary z-50">
                    <svg width="37" height="10" viewBox="0 0 37 10" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="Group 27">
                            <circle id="Ellipse 19" cx="5" cy="5" r="5" class="fill-rose-500" />
                            <circle id="Ellipse 20" cx="18" cy="5" r="5" fill="#FFE500" />
                            <circle id="Ellipse 21" cx="32" cy="5" r="5" fill="#05FF00" />
                        </g>
                    </svg>

                </td>
            </tr>
            <tr class="text-white bg-primary relative rounded-full overflow-hidden h-[50px] px-[50px] capitalize ">
                <th class="before:left-3 before:w-8 pl-10 ">
                    Nama
                </th>
                <th>Nisn</th>
                <th>Jurusan</th>
                <th>Jenis Kelamin</th>
                <th>tamatan</th>
                <th>Phone</th>
            </tr>
        </thead>



        <tbody class="text-center divide-x capitalize">
            @foreach ($freshGraduate as $item)
                <tr class="divide-x ">
                    <td class=" py-4   max-w-[350px] ">
                        <h1 class="">{{ $item->name }}</h1>
                    </td>
                    <td>{{ $item->nisn }}</td>
                    <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                        @php
                            if ($jurusan = $item->nama_jurusan) {
                                $words = explode(' ', $jurusan);

                                $abbreviation = '';
                                foreach ($words as $word) {
                                    $abbreviation .= str($word[0]);
                                }
                                echo $abbreviation;
                            } else {
                                echo '-';
                            }
                        @endphp</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->tamatan }}</td>
                    <td>{{ $item->no_telp }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="bg-white">
                <td colspan="6" class="px-5 py-1">{{ $freshGraduate->links() }}</td>
            </tr>
        </tfoot>
    </table>
</div>
