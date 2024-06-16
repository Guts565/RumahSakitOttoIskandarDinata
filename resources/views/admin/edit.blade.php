<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Edit Data Dokter</h1>
        <form method="POST" action="{{ url('/dokter/' . $dokter->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="poliklinik" class="block text-gray-700">Poliklinik:</label>
                <input type="text" id="poliklinik" name="poliklinik" value="{{ $dokter->poliklinik }}" required
                    class="w-full p-2 border border-gray-300 rounded-lg">
            </div>
            <div class="mb-4">
                <label for="nama" class="block text-gray-700">Nama:</label>
                <input type="text" id="nama" name="nama" value="{{ $dokter->nama }}" required
                    class="w-full p-2 border border-gray-300 rounded-lg">
            </div>
            <div class="mb-4">
                <label for="senin" class="block text-gray-700">Senin:</label>
                <input type="text" id="senin" name="senin" value="{{ $dokter->senin }}" required
                    class="w-full p-2 border border-gray-300 rounded-lg">
            </div>
            <div class="mb-4">
                <label for="selasa" class="block text-gray-700">Selasa:</label>
                <input type="text" id="selasa" name="selasa" value="{{ $dokter->selasa }}" required
                    class="w-full p-2 border border-gray-300 rounded-lg">
            </div>
            <div class="mb-4">
                <label for="rabu" class="block text-gray-700">Rabu:</label>
                <input type="text" id="rabu" name="rabu" value="{{ $dokter->rabu }}" required
                    class="w-full p-2 border border-gray-300 rounded-lg">
            </div>
            <div class="mb-4">
                <label for="kamis" class="block text-gray-700">Kamis:</label>
                <input type="text" id="kamis" name="kamis" value="{{ $dokter->kamis }}" required
                    class="w-full p-2 border border-gray-300 rounded-lg">
            </div>
            <div class="mb-4">
                <label for="jumat" class="block text-gray-700">Jum'at:</label>
                <input type="text" id="jumat" name="jumat" value="{{ $dokter->jumat }}" required
                    class="w-full p-2 border border-gray-300 rounded-lg">
            </div>
            <div class="mb-4">
                <label for="sabtu" class="block text-gray-700">Sabtu:</label>
                <input type="text" id="sabtu" name="sabtu" value="{{ $dokter->sabtu }}" required
                    class="w-full p-2 border border-gray-300 rounded-lg">
            </div>
            <button type="submit"
                class="w-full bg-blue-900 text-white py-2 px-4 rounded-lg hover:bg-blue-500">Update</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/js/all.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
</body>

</html>
