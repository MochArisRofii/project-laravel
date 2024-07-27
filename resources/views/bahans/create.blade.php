<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <title>Tambah Bahan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 500px;
            width: 100%;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .btn-secondary {
            background-color: #007BFF;
            margin-top: 20px;
        }

        .btn-secondary:hover {
            background-color: #0056b3;
        }

        a {
            text-align: center;
            display: block;
            color: #007BFF;
            text-decoration: none;
            margin-top: 20px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Tambah Bahan</h1>

        <form action="{{ route('bahans.store') }}" method="POST">
            @csrf
            <input type="hidden" name="resep_id" value="{{ $resep->id }}">

            <label for="name">Nama Bahan:</label>
            <input type="text" name="name" id="name" required>

            <label for="deskripsi">Deskripsi:</label>
            <textarea name="deskripsi" id="deskripsi" required></textarea>

            <label for="quantity">Jumlah:</label>
            <input type="number" name="quantity" id="quantity" required>

            <label for="unit">Satuan:</label>
            <input type="text" name="unit" id="unit" required>

            <button class="btn" type="submit">Tambah Bahan</button>
        </form>

        <a class="btn btn-secondary" href="{{ route('reseps.show', $resep->id) }}">Kembali ke Detail Resep</a>
    </div>
</body>

</html>
