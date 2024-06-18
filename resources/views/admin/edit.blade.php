<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/css/tw-elements.min.css" />
    <script src="https://cdn.tailwindcss.com/3.3.0"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                fontFamily: {
                    sans: ["Roboto", "sans-serif"],
                    body: ["Roboto", "sans-serif"],
                    mono: ["ui-monospace", "monospace"],
                },
            },
            corePlugins: {
                preflight: false,
            },
        };
    </script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Edit Data Dokter</h1>
        <form method="POST" action="{{ url('/dokter/' . $dokter->id) }}">
            @csrf
            @method('PUT')
            <div class="relative mb-3" data-twe-input-wrapper-init>
                <input type="text"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                    id="poliklinik" placeholder="{{ $dokter->poliklinik }}" name="poliklinik" />
                <label for="poliklinik"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">{{ $dokter->poliklinik }}
                </label>
                <div class="absolute w-full text-sm text-neutral-500" data-twe-input-helper-ref>
                    Poliklinik
                </div>
            </div>&nbsp;
            <div class="relative mb-3 mt-2" data-twe-input-wrapper-init>
                <input type="text"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                    id="nama" placeholder="Example label" name="nama" />
                <label for="nama"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">{{ $dokter->nama }}
                </label>
                <div class="absolute w-full text-sm text-neutral-500" data-twe-input-helper-ref>
                    Dokter
                </div>
            </div>&nbsp;
            <div class="relative mb-3 mt-2" data-twe-input-wrapper-init>
                <input type="text"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                    id="senin" placeholder="Example label" name="senin" />
                <label for="senin"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">{{ $dokter->senin }}
                </label>
                <div class="absolute w-full text-sm text-neutral-500" data-twe-input-helper-ref>
                    Senin
                </div>
            </div>&nbsp;
            <div class="relative mb-3 mt-2" data-twe-input-wrapper-init>
                <input type="text"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                    id="selasa" placeholder="Example label" name="selasa" />
                <label for="selasa"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">{{ $dokter->selasa }}
                </label>
                <div class="absolute w-full text-sm text-neutral-500" data-twe-input-helper-ref>
                    Selasa
                </div>
            </div>&nbsp;
            <div class="relative mb-3 mt-2" data-twe-input-wrapper-init>
                <input type="text"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                    id="rabu" placeholder="Example label" name="rabu" />
                <label for="rabu"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">{{ $dokter->rabu }}
                </label>
                <div class="absolute w-full text-sm text-neutral-500" data-twe-input-helper-ref>
                    Rabu
                </div>
            </div>&nbsp;
            <div class="relative mb-3 mt-2" data-twe-input-wrapper-init>
                <input type="text"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                    id="kamis" placeholder="Example label" name="kamis" />
                <label for="kamis"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">{{ $dokter->kamis }}
                </label>
                <div class="absolute w-full text-sm text-neutral-500" data-twe-input-helper-ref>
                    Kamis
                </div>
            </div>&nbsp;
            <div class="relative mb-3 mt-2" data-twe-input-wrapper-init>
                <input type="text"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                    id="jumat" placeholder="Example label" name="jumat" />
                <label for="jumat"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">{{ $dokter->jumat }}
                </label>
                <div class="absolute w-full text-sm text-neutral-500" data-twe-input-helper-ref>
                    Jumat
                </div>
            </div>&nbsp;
            <div class="relative mb-3 mt-2" data-twe-input-wrapper-init>
                <input type="text"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                    id="sabtu" placeholder="Example label" name="sabtu" />
                <label for="sabtu"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">{{ $dokter->sabtu }}
                </label>
                <div class="absolute w-full text-sm text-neutral-500" data-twe-input-helper-ref>
                    Sabtu
                </div>
            </div>&nbsp;
            {{-- <div class="mb-4">
                <label for="poliklinik" class="block text-gray-700">Poliklinik:</label>
                <input type="text" id="poliklinik" name="poliklinik" value="{{ $dokter->poliklinik }}" required
                    class="w-full p-2 border border-gray-300 rounded-lg">
            </div> --}}
            {{-- <div class="mb-4">
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
            </div> --}}
            <button type="submit"
                class="w-full bg-blue-900 text-white py-2 px-4 mb-3 rounded-lg hover:bg-blue-500">Update</button>
            <a href="{{ url('/') }}"><input type="button"
                    class="w-full bg-blue-900 text-white py-2 px-4 mb-3 rounded-lg hover:bg-blue-500"
                    value="Back"></a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/js/tw-elements.umd.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/js/all.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
</body>

</html>
