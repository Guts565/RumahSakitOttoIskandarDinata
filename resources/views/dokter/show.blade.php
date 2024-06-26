<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Detail Dokter</h1>
        @if ($dokter)
            <div class="space-y-2">
                <p><span class="font-semibold">Poliklinik:</span> {{ $dokter->poli->poli }}</p>
                <p><span class="font-semibold">Dokter:</span> {{ $dokter->nama }}</p>
                <p class="pr-20 text-center"><span class="font-semibold">Jadwal:</span></p>
                <ul>
                    @foreach ($dokter->jadwals as $jadwal)
                        <li>
                            <span class="font-semibold">Hari:</span> {{ $jadwal->hari }} |
                            <span class="font-semibold">Waktu:</span> {{ $jadwal->waktu }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <p class="text-center text-red-500">Dokter tidak ditemukan.</p>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/js/all.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
</body>

</html>
