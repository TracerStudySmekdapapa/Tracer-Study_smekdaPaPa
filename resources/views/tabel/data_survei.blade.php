<table class="min-w-full text-sm bg-white divide-y-2 divide-gray-200">
    <tbody class="text-center divide-y divide-gray-200">

        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Jurusan</td>
            {{--   @foreach ($survei as $item)
                <td>{{ $item->pribadi->nisn }}</td>
            @endforeach --}}
            @for ($i = 1; $i < $survei->count(); $i++)
                <td>Pertanyaan {{ $i }}</td>
            @endfor
        </tr>

        @foreach ($data as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->pribadie->jurusan->nama_jurusan }}</td>
                @foreach ($item->jawaban as $item)
                    <td>{{ $item->jawaban }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
