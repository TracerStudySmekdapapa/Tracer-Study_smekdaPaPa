<table class="min-w-full text-sm bg-white divide-y-2 divide-gray-200">
    <tbody class="text-center divide-y divide-gray-200">

        <tr>
            <td>No</td>
            <td>Nama Pertanyaan</td>
        </tr>

        @foreach ($data as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td> {{ $item->pertanyaan }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
