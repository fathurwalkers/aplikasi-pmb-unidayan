<div>
    <br>
    <br>
    <ul>
        @foreach ($mahasiswa as $item)
            <li>{{ $item->data_nama_lengkap }}</li>
        @endforeach
    </ul>
</div>
