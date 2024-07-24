<!DOCTYPE html>
<html>
<head>
    <title>Detail Resep</title>
</head>
<body>
    <h1>{{ $resep->name }}</h1>
    <p>{{ $resep->deskripsi }}</p>

    <h2>Daftar Bahan</h2>
    <ul>
        @foreach($bahans as $bahan)
            <li>
                {{ $bahan->name }} - {{ $bahan->quantity }} {{ $bahan->unit }} 
                @if($bahan->deskripsi)
                    ({{ $bahan->deskripsi }})
                @endif
            </li>
        @endforeach
    </ul>

    <a href="{{ route('bahans.create', $resep->id) }}">Tambah Bahan</a>
    <br>
    <a href="{{ route('reseps.index') }}">Kembali ke Daftar Resep</a>
</body>
</html>
