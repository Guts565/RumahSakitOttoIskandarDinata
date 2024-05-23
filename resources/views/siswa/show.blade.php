<!DOCTYPE html>
<html>

<head>
    <title>Detail Siswa</title>
</head>

<body>
    <h1>Detail Siswa</h1>
    @if ($siswa)
        <p>Nama: {{ $siswa->nama }}</p>
        <p>Alamat: {{ $siswa->alamat }}</p>
        <p>Nomor HP: {{ $siswa->no_telp }}</p>
    @else
        <p>Siswa tidak ditemukan.</p>
    @endif
</body>

</html>
