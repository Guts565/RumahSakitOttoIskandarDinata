<!DOCTYPE html>
<html>

<head>
    <title>Detail Dokter</title>
</head>

<body>
    <h1>Detail Dokter</h1>
    @if ($dokter)
        <p>Profesi: {{ $dokter->poliklinik }}</p>
        <p>Dokter: {{ $dokter->nama }}</p>
        <p>Senin: {{ $dokter->senin }}</p>
        <p>Selasa: {{ $dokter->selasa }}</p>
        <p>Rabu: {{ $dokter->rabu }}</p>
        <p>Kamis: {{ $dokter->kamis }}</p>
        <p>Jum'at: {{ $dokter->jumat }}</p>
        <p>Sabtu: {{ $dokter->sabtu }}</p>
    @else
        <p>Dokter tidak ditemukan.</p>
    @endif
</body>

</html>
