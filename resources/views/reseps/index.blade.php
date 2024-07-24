<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Masakan</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <h1>Daftar Masakan</h1>

        <a href="{{ route('reseps.create') }}"
            style="display: inline-block; padding: 10px 20px; margin-bottom: 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">Tambah
            Resep Baru</a>
        <ul>
            @foreach ($reseps as $resep)
                <li>
                    <a href="{{ route('reseps.show', $resep->id) }}">{{ $resep->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</body>

</html>
