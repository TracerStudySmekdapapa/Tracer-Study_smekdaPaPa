<div class="overflow-hidden overflow-x-auto">
    <div class="flex items-center justify-between mt-2 mb-5">
        <h1 class=" font-semibold text-[20px] capitalize">Data fresh graduate</h1>
        <div class="flex items-start justify-center ">
            <a href="{{ route('exportFreshGraduate') }}"
                class="px-4 py-1 ml-auto text-sm text-white bg-green-600 rounded-md ">Export to .xlsx</a>
        </div>
    </div>
    <table class="min-w-full overflow-hidden text-sm bg-white divide-y-2 divide-gray-200 rounded-lg">
        <thead class="rounded-xl">
            <tr class="bg-gray-100">
                <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                    Nama
                </th>
                <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                    NISN
                </th>
                <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                    Jurusan
                </th>
                <th class="px-4 py-2 font-medium text-gray-900 capitalize whitespace-nowrap">
                    Jenis Kelamin
                </th>
                <th class="px-4 py-2 font-medium text-gray-900 capitalize whitespace-nowrap">
                    Phone
                </th>
            </tr>
        </thead>

        <tbody class="text-center divide-y divide-gray-200">
            @foreach ($freshGraduate as $item)
                <tr>
                    <td class="px-4 py-2 font-medium text-gray-900 capitalize whitespace-nowrap">
                        {{ $item->name }}
                    </td>
                    <td class="px-4 py-2 text-gray-700 whitespace-nowrap">{{ $item->nisn }}</td>
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
                    <td class="px-4 py-2 text-gray-700 capitalize whitespace-nowrap">{{ $item->jenis_kelamin }}</td>
                    <td class="px-4 py-2 text-gray-700 whitespace-nowrap">{{ $item->no_telp }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="bg-gray-100">
                <td colspan="6" class="px-5 py-1">{{ $freshGraduate->links() }}</td>
            </tr>
        </tfoot>
    </table>



</div>
