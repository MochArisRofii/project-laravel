<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <title>Detail Resep</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            /* text-align: center; */
            color: #333;
            margin-bottom: 20px;
            font-size: 2em;
        }

        h2 {
            text-align: center;
            color: #666;
            margin-bottom: 20px;
            font-size: 1.5em;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            color: #555;
            margin-bottom: 30px;
            text-align: justify;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            background-color: #f8f9fa;
            margin: 10px 0;
            padding: 15px;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            font-size: 18px;
            line-height: 1.4;
            color: #333;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        ul li:hover {
            background-color: #e9ecef;
            transform: translateY(-3px);
        }

        .ingredient-desc {
            font-size: 14px;
            color: #777;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            padding: 12px 24px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn:hover {
            background-color: #45a049;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background-color: #007BFF;
        }

        .btn-secondary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .link {
            display: inline-block;
            margin-top: 30px;
            color: #4CAF50;
            text-decoration: none;
            font-size: 16px;
            text-align: center;
            width: 100%;
        }

        .link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>{{ $resep->name }}</h1>
        <p>{{ $resep->deskripsi }}</p>

        <h2>Daftar Bahan</h2>
        <ul>
            @foreach ($bahans as $bahan)
                <li>
                    <div>
                        {{ $bahan->name }} - {{ (int) $bahan->quantity }} {{ $bahan->unit }}
                        <span class="ingredient-desc">{{ $bahan->deskripsi ? $bahan->deskripsi : '' }}</span>
                    </div>
                    <div>
                        <a href="{{ route('bahans.edit', $bahan->id) }}" class="btn btn-secondary">Ubah</a>
                        <form action="{{ route('bahans.destroy', $bahan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="btn-container">
            <a href="{{ route('bahans.create', $resep->id) }}" class="btn">Tambah Bahan</a>
        </div>

        <a href="{{ route('reseps.index') }}" class="link">Kembali ke Daftar Resep</a>
    </div>
</body>

</html>
