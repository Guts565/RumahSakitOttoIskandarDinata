<!DOCTYPE html>
<html>

<head>
    <title>Detail Dokter</title>
</head>

<body>
    <h1>Detail Dokter</h1>
    @if ($dokter)
        <p>Nama: {{ $dokter->nama }}</p>
        <p>Alamat: {{ $dokter->alamat }}</p>
        <p>Nomor HP: {{ $dokter->no_telp }}</p>
        <p>Profesi: {{ $dokter->profesi }}</p>
    @else
        <p>Dokter tidak ditemukan.</p>
    @endif
</body>

</html>
