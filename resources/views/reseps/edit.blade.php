<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Resep</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 32px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            font-weight: bold;
        }

        input, textarea, button {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #4CAF50;
            text-decoration: none;
            font-size: 16px;
        }

        .link:hover {
            text-decoration: underline;
        }

        .image-preview {
            display: block;
            max-width: 30%; /* Menyesuaikan lebar maksimum gambar dengan lebar kontainer */
            max-height: auto; /* Menetapkan tinggi maksimum gambar agar tidak terlalu besar */
            height: auto; /* Memastikan proporsi gambar tetap terjaga */
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Resep</h1>

        <form action="{{ route('reseps.update', $resep->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="name">Nama Resep:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $resep->name) }}" required>
            @error('name')
                <div style="color: red;">{{ $message }}</div>
            @enderror

            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" required>{{ old('deskripsi', $resep->deskripsi) }}</textarea>
            @error('deskripsi')
                <div style="color: red;">{{ $message }}</div>
            @enderror

            @if($resep->photo)
                <img src="{{ asset('storage/' . $resep->photo) }}" alt="Foto Resep" class="image-preview">
            @endif

            <label for="photo">Foto Resep:</label>
            <input type="file" id="photo" name="photo">
            @error('photo')
                <div style="color: red;">{{ $message }}</div>
            @enderror

            <button type="submit">Simpan Perubahan</button>
        </form>

        <a href="{{ route('reseps.index') }}" class="link">Kembali Menu Resep</a>
    </div>
</body>

</html>
