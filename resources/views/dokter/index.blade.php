<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Dokter</title>
    <link rel="icon" type="image/png" href="images/logo.png">
    <link href="/css/style.css" rel="stylesheet">
    <script defer src="/js/animation.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .dataTables_wrapper .dataTables_length {
            display: none !important;
        }
    </style>
</head>

<body class="font-sans">
    <div id="top"></div>
    <nav
        class="top-0 z-10 block w-full max-w-full px-4 py-2 text-black bg-neutral-200 border rounded-md shadow-md h-max border-black bg-opacity-100 backdrop-blur-2xl backdrop-saturate-200 lg:px-8 lg:py-4 custom-hidden">
        <div class="flex items-center justify-between text-blue-gray-900 custom-hidden">
            <a href="#top" id="logo-link">
                <img src="images/logo.png" alt="Logo" id="logo">
            </a>
            <div class="flex items-center gap-4">
                <div class="hidden mr-4 lg:block mt-3">
                    <ul class="flex flex-col gap-2 mt-2 mb-4 lg:mb-0 lg:mt-0 lg:flex-row lg:items-center lg:gap-6">
                        <li
                            class="block p-1 font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            <a href="#" class="flex items-center">
                                Pages
                            </a>
                        </li>
                        <li
                            class="block p-1 font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            <a href="#" class="flex items-center">
                                Account
                            </a>
                        </li>
                        <li
                            class="block p-1 font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            <a href="#" class="flex items-center">
                                Blocks
                            </a>
                        </li>
                        <li
                            class="block p-1 font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            <a href="#" class="flex items-center">
                                Docs
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="flex items-center gap-x-1">
                    {{-- <button
                        class="hidden px-4 py-2 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:inline-block"
                        type="button">
                        <span>Log In</span>
                    </button> --}}
                    <button onclick="location.href='{{ url('/login') }}'"
                        class="rounded-lg bg-gradient-to-tr from-gray-900 to-gray-800 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:inline-block"
                        type="button">
                        <span>Login</span>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Carousel -->
    <div class="swiper custom-hidden-slide">
        {{-- <div class="swiper-wrapper h-64 sm:h-72 md:h-96 lg:h-[800px]"> --}}
        <div class="swiper-wrapper">
            <!-- Slide 1: Profile Dokter -->
            <div class="swiper-slide flex flex-wrap items-center justify-center h-full w-full" id="slide-doctor">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-2 w-full ">
                    @for ($i = 0; $i < 4; $i++)
                        @php
                            $doctor = $semuaDokter[$i];
                            $image_url = $doctor->image
                                ? asset('storage/images/' . $doctor->image)
                                : asset(
                                    'https://st3.depositphotos.com/6672868/13701/v/450/depositphotos_137014128-stock-illustration-user-profile-icon.jpg',
                                );
                        @endphp
                        <div class="text-center mx-auto flex flex-col items-center"
                            id="doctor-profile-{{ $i }}">
                            <img class="h-96 w-96 rounded mx-auto object-cover" id="doctor-img-{{ $i }}"
                                src="{{ $image_url }}" alt="{{ $doctor->nama }}">
                            <h2 class="text-2xl font-bold text-white mt-4" id="doctor-name-{{ $i }}">
                                {{ $doctor->nama }}</h2>
                            <p class="text-2xl text-white mt-2" id="doctor-poliklinik-{{ $i }}">
                                {{ $doctor->poli->poli }}</p>
                            <div class="text-md text-white mt-2" id="doctor-jadwal-{{ $i }}">
                                @foreach ($doctor->jadwals as $jadwal)
                                    <p class="text-center">{{ $jadwal->hari }} : {{ $jadwal->waktu }}</p>
                                @endforeach
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            <!-- Slide 2: Alur Pendaftaran -->
            <div class="swiper-slide ">
                <img src="{{ asset('storage/carousel/' . $carousels->slide2) }}" class="w-full h-full object-fit"
                    alt="Alur Pendaftaran">
            </div>

            <!-- Slide 3: FAQ -->
            <div class="swiper-slide ">
                <img src="{{ asset('storage/carousel/' . $carousels->slide3) }}" class="w-full h-full object-fit"
                    alt="FAQ">
            </div>
        </div>

        <!-- If we need pagination -->
        {{-- <div class="swiper-pagination"></div> --}}

        <!-- If we need navigation buttons -->
        {{-- <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div> --}}

        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>

    </div>

    <!-- Jadwal Dokter -->
    <div class="container mx-auto mt-[8rem] mb-[4rem] shadow-lg px-4 custom-hidden custom-hidden">
        <div class="bg-transparent rounded-lg shadow-lg overflow-hidden">
            <div class="bg-transparent text-white py-4">
            </div>
            <div class="p-6 custom-hidden">
                <h1 class="text-center text-white text-2xl font-bold mb-4 ">Jadwal Dokter</h1>
                @if (count($semuaDokter) > 0)
                    <div class="overflow-x-auto overflow-y-auto">
                        <table id="dokterTable" class="min-w-full text-white ">
                            <thead class="bg-transparent border-b ">
                                <tr>
                                    <th class="py-2 px-10 text-left">Dokter</th>
                                    <th class="py-2 px-1 text-left">Jadwal</th>
                                    <th class="py-2 px-16 text-left"></th>
                                </tr>
                            </thead>
                            <tbody class="custom-hidden">
                                @foreach ($semuaDokter as $s)
                                    <tr class="border-black border-b border-t">
                                        <td class="py-4 px-4 transparent-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink custom-hidden">
                                                    @if ($s->image)
                                                        <img class="h-[130px] w-[130px] rounded-full object-cover object-center"
                                                            src="{{ asset('storage/images/' . $s->image) }}"
                                                            alt="">
                                                    @else
                                                        <img class="h-[130px] w-[130px] rounded-full object-cover"
                                                            src="https://st3.depositphotos.com/6672868/13701/v/450/depositphotos_137014128-stock-illustration-user-profile-icon.jpg"
                                                            alt="">
                                                    @endif
                                                </div>
                                                <div class="ml-4 custom-hidden">
                                                    <div class="text-lg text-white">
                                                        {{ $s->nama }}
                                                    </div>
                                                    <div class="text-lg text-gray-400">
                                                        {{ $s->poli->poli }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-1 px-1 custom-hidden">
                                            @foreach ($s->jadwals as $jadwal)
                                                <p class="text-lg text-white">{{ $jadwal->hari }}:
                                                    {{ $jadwal->waktu }}
                                                </p>
                                            @endforeach
                                        </td>
                                        <td class="py-1 px-1"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-center text-white custom-hidden">Tidak ada data yang ditemukan.</p>
                @endif
            </div>
        </div>
    </div>
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
    </script>
    <script>
        const doctors = @json($semuaDokter);
        const assetPath = "{{ asset('storage/images/') }}"; // Set asset path for images
    </script>
    {{-- <script type="application/json" id="doctor-data">
        @json($semuaDokter)
    </script> --}}
    <script src="/js/datatables.js"></script>
    <script src="/js/swiper.js"></script>
</body>

</html>
