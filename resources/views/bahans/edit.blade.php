<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <title>Edit Bahan</title>
    <style>
        /* Tambahkan gaya sesuai kebutuhan untuk tampilan modern */
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
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            font-weight: bold;
        }

        input, textarea, select {
            margin-top: 5px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
        }

        button {
            margin-top: 20px;
            padding: 12px 24px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .link {
            display: inline-block;
            margin-top: 20px;
            color: #4CAF50;
            text-decoration: none;
        }

        .link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Bahan</h1>

        <form action="{{ route('bahans.update', $bahan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Nama Bahan:</label>
            <input type="text" name="name" id="name" value="{{ $bahan->name }}" required>

            <label for="deskripsi">Deskripsi:</label>
            <textarea name="deskripsi" id="deskripsi" required>{{ $bahan->deskripsi }}</textarea>

            <label for="quantity">Jumlah:</label>
            <input type="number" name="quantity" id="quantity" value="{{ (int) $bahan->quantity }}" required>

            <label for="unit">Satuan:</label>
            <input type="text" name="unit" id="unit" value="{{ $bahan->unit }}" required>

            <label for="resep_id">Resep:</label>
            <select name="resep_id" id="resep_id" required>
                @foreach ($reseps as $resep)
                    <option value="{{ $resep->id }}" {{ $bahan->resep_id == $resep->id ? 'selected' : '' }}>
                        {{ $resep->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit">Update Bahan</button>
        </form>

        <a href="{{ route('reseps.show', $bahan->resep_id) }}" class="link">Kembali ke Detail Resep</a>
    </div>
</body>
</html>
