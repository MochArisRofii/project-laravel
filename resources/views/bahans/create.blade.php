<!DOCTYPE html>
<html>
<head>
    <title>Tambah Bahan</title>
</head>
<body>
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

        <button type="submit">Tambah Bahan</button>
    </form>

    <a href="{{ route('reseps.show', $resep->id) }}">Kembali ke Detail Resep</a>
</body>
</html>
