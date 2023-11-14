<table class="min-w-full text-sm bg-white divide-y-2 divide-gray-200">
    <thead>
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
                Jenis Kelamin
            </th>
            <th class="px-4 py-2 font-medium text-gray-900 capitalize whitespace-nowrap">
                Phone
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
                    {{ $item->nama_jurusan }}</td>
                <td class="px-4 py-2 text-gray-700 capitalize whitespace-nowrap">{{ $item->jenis_kelamin }}</td>
                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">{{ $item->no_telp }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
