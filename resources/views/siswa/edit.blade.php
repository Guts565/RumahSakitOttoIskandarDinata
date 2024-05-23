<!DOCTYPE html>
<html>

<head>
    <title>Edit Siswa</title>
    <!-- Tambahkan link ke CSS Anda di sini jika ada -->
</head>

<body>
    <h1>Edit Siswa</h1>
    <!-- Form untuk mengedit siswa -->
    <form method="POST" action="{{ url('/siswa/' . $siswa->id) }}">
        @csrf
        @method('PUT') <!-- Method spoofing untuk mengizinkan update -->
        <!-- Field nama -->
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="{{ $siswa->nama }}" required>
        <!-- Field alamat -->
        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" value="{{ $siswa->alamat }}" required>
        <!-- Field no_telp -->
        <label for="no_telp">Nomor Telepon:</label>
        <input type="text" id="no_telp" name="no_telp" value="{{ $siswa->no_telp }}" required>
        <!-- Tombol submit -->
        <button type="submit">Update</button>
    </form>
</body>

</html>
