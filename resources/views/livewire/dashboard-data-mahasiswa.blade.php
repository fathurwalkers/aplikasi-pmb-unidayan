<div>
    <br>
    <br>
    <ul>
        @foreach ($mahasiswa as $item)
            <li>{{ $item->data_nama }}</li>
        @endforeach
    </ul>
</div>
