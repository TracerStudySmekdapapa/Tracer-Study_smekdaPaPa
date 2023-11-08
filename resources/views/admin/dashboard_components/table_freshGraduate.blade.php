<div class="overflow-x-auto">
    <h1 class="mt-2 mb-5 font-semibold text-[20px] capitalize">data fresh graduate</h1>
    <table class="min-w-full text-sm bg-white divide-y-2 divide-gray-200">
        <thead class="ltr:text-left rtl:text-right">
            <tr>
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
                    jenis Kelamin
                </th>
                <th class="px-4 py-2 font-medium text-gray-900 capitalize whitespace-nowrap">
                    phone
                </th>
                <th class="px-4 py-2"></th>
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
    </table>
</div>
