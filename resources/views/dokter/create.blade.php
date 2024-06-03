<!DOCTYPE html>
<html>

<head>
    <title>Formulir Pembuatan Student</title>
</head>

<body>
    <h1>Formulir Pembuatan Student</h1>
    <form method="POST" action="/siswa">
        @csrf
        {{ csrf_field() }}
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required>
        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" id="alamat" required>
        <label for="no_telp">Nomor HP:</label>
        <input type="text" name="no_telp" id="no_telp" required>
        <label for="no_telp">Profesi:</label>
        <input type="text" name="profesi" id="profesi" required>
        <button type="submit">Simpan</button>
    </form>
</body>

</html>