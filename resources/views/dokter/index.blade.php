<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Dokter</title>
    <link href="css/style.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/css/tw-elements.min.css">
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

<body>

    <!-- Carousel -->
    <div id="default-carousel" class="relative" data-carousel="slide" data-carousel-interval="4000">
        <!-- Carousel wrapper -->
        {{-- <div class="relative h-96 overflow-hidden rounded-lg md:h-128"> --}}
        {{-- <div class="relative h-[400] overflow-hidden rounded-lg md:h-[600px]"> --}}
        <div class="relative h-64 sm:h-72 md:h-96 lg:h-[600px] overflow-hidden rounded-lg">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="../images/23-1.png"
                    class="absolute block h-full  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="../images/Alur.png"
                    class="absolute block w-full h-full  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                    alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="../images/faq.png"
                    class="absolute block w-full h-full  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                    alt="...">
            </div>
            <!-- Item 4 -->
            {{-- <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://www.dexerto.com/cdn-image/wp-content/uploads/2024/04/10/berserk-return-date.jpg?width=3840&quality=60&format=auto"
                    class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                    alt="...">
            </div> --}}
            <!-- Item 5 -->
            {{-- <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://static1.srcdn.com/wordpress/wp-content/uploads/2021/02/Berserk-80-005-Header-Real.jpg"
                    class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                    alt="...">
            </div> --}}
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-2 h-2 rounded-full" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
            <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
            <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 3"
                data-carousel-slide-to="2"></button>
            {{-- <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 4"
                data-carousel-slide-to="3"></button>
            <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 5"
                data-carousel-slide-to="4"></button> --}}
        </div>
        <!-- Slider controls -->
        <button type="button"
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    <!-- Jadwal Dokter -->
    <div class="container mx-auto mt-10 px-4">
        <div class="bg-transparent rounded-lg shadow-lg overflow-hidden">
            <div class="bg-transparent text-white py-4">
                <h1 class="text-center text-2xl font-bold">Jadwal Dokter</h1>
            </div>
            <div class="p-6">
                @if (count($semuaDokter) > 0)
                    <div class="overflow-x-auto">
                        <table id="dokterTable" class="min-w-full text-white">
                            <thead class="bg-transparent">
                                <tr>
                                    <th class="py-2 px-1 text-left">Dokter</th>
                                    <th class="py-2 px-1 text-left"></th>
                                    <th class="py-2 px-1 text-left">Jadwal</th>
                                    <th class="py-2 px-1 text-left"></th>
                                    <th class="py-2 px-1 text-left"></th>
                                    <th class="py-2 px-1 text-left"></th>
                                    <th class="py-2 px-1 text-left"></th>
                                    <th class="py-2 px-1 text-left"></th>
                                    <th class="py-2 px-1 text-left"></th>
                                    <th class="py-2 px-1 text-left"></th>
                                    <th class="py-2 px-1 text-left"></th>
                                    <th class="py-2 px-1 text-left"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($semuaDokter as $s)
                                    <tr>
                                        <td class="py-1 px-1 transparent-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full"
                                                        src="https://www.guildforddentalcentre.com.au/wp-content/uploads/2015/12/pic-team-1.jpg"
                                                        alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-md text-white">
                                                        {{ $s->nama }}
                                                    </div>
                                                    <div class="text-md text-gray-400">
                                                        {{ $s->poliklinik }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-1 px-1"></td>
                                        <td class="py-1 px-1">{{ $s->jadwal }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-center text-white">Tidak ada data dokter yang ditemukan.</p>
                @endif
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>
