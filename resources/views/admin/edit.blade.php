<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Dokter</title>
    <!-- Tambahkan link ke CSS Anda di sini jika ada -->
</head>

<body>
    <h1>Edit Data Dokter</h1>
    <!-- Form untuk mengedit dokter -->
    <form method="POST" action="{{ url('/dokter/' . $dokter->id) }}">
        @csrf
        @method('PUT') <!-- Method spoofing untuk mengizinkan update -->
        <label for="profesi">Profesi:</label>&nbsp;
        <input type="text" id="profesi" name="profesi" value="{{ $dokter->profesi }}" required>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="{{ $dokter->nama }}" required>
        <!-- Tombol submit -->
        <button type="submit">Update</button>
    </form>
</body>

</html>
