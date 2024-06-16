<!DOCTYPE html>
<html>

<head>
    <title>Formulir Pembuatan Student</title>
</head>

<body>
    <h1>Formulir Pembuatan Student</h1>
    <form method="POST" action="/dokter">
        @csrf
        {{ csrf_field() }}
        <label for="no_telp">Profesi:</label>
        <input type="text" name="profesi" id="profesi" required>
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required>
        <button type="submit">Simpan</button>
    </form>
</body>

</html>