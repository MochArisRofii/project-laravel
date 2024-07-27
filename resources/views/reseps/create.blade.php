<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Resep</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #444;
            margin-bottom: 20px;
            font-size: 36px;
            font-weight: 600;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 18px;
            font-weight: 500;
            color: #555;
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"], textarea, input[type="file"], button {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s, transform 0.3s;
        }

        button:hover {
            background-color: #45a049;
            transform: translateY(-2px);
        }

        .error-message {
            color: #d9534f;
            margin-top: 5px;
            font-size: 14px;
        }

        .link {
            display: block;
            text-align: center;
            margin-top: 30px;
            color: #4CAF50;
            text-decoration: none;
            font-size: 18px;
        }

        .link:hover {
            text-decoration: underline;
        }

        .form-group input[type="file"] {
            padding: 6px;
        }

        .form-group input[type="text"] {
            margin-bottom: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Tambah Resep Baru</h1>

        <!-- Formulir untuk menambah resep baru -->
        <form action="{{ route('reseps.store') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- Token CSRF untuk keamanan -->

            <div class="form-group">
                <label for="name">Nama Resep:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" required>{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="photo">Foto Resep:</label>
                <input type="file" id="photo" name="photo">
                @error('photo')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Simpan</button>
        </form>

        <a href="{{ route('home') }}" class="link">Kembali ke Halaman Utama</a>
    </div>
</body>

</html>
