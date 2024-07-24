<!DOCTYPE html>
<html>
<head>
    <title>Tambah Resep</title>
</head>
<body>
    <h1>Tambah Resep Baru</h1>

    <!-- Formulir untuk menambah resep baru -->
    <form action="{{ route('reseps.store') }}" method="POST">
        @csrf <!-- Token CSRF untuk keamanan -->
        
        <label for="name">Nama Resep:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        @error('name')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <br>

        <label for="deskripsi">Deskripsi:</label>
        <textarea id="deskripsi" name="deskripsi" required>{{ old('deskripsi') }}</textarea>
        @error('deskripsi')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <br>

        <button type="submit">Simpan</button>
    </form>

    <a href="{{ route('home') }}">Kembali ke Halaman Utama</a>
</body>
</html>
