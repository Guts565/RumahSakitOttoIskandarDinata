<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Dokter</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="js/tailwind.config.js" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="font-sans">

    <!-- Carousel -->
    <div class="swiper">
        {{-- <div class="swiper-wrapper h-64 sm:h-72 md:h-96 lg:h-[800px]"> --}}
        <div class="swiper-wrapper">
            <!-- Slide 1: Profile Dokter -->
            <div class="swiper-slide flex items-center justify-center h-full w-full rounded-full" id="slide-doctor">
                @for ($i = 0; $i < 4; $i++)
                    @php
                        $doctor = $semuaDokter[$i % count($semuaDokter)];
                        $image_url = $doctor->image
                            ? asset('storage/images/' . $doctor->image)
                            : asset(
                                'https://st3.depositphotos.com/6672868/13701/v/450/depositphotos_137014128-stock-illustration-user-profile-icon.jpg',
                            );
                    @endphp
                    <div class="text-center mx-auto" id="doctor-profile-{{ $i }}">
                        <img class="h-96 w-96 rounded mx-auto object-cover" id="doctor-img-{{ $i }}"
                            src="{{ $image_url }}" alt="{{ $doctor->nama }}">
                        <h2 class="text-2xl font-bold text-white mt-4" id="doctor-name-{{ $i }}">
                            {{ $doctor->nama }}</h2>
                        <p class="text-2xl text-white" id="doctor-poliklinik-{{ $i }}">
                            {{ $doctor->poli->poli }}</p>
                        <div class="text-md text-white" id="doctor-jadwal-{{ $i }}">
                            @foreach ($doctor->jadwals as $jadwal)
                                <p>{{ $jadwal->hari }} - {{ $jadwal->waktu }}</p>
                            @endforeach
                        </div>
                    </div>
                @endfor
            </div>
            <!-- Slide 2: Alur Pendaftaran -->
            <div class="swiper-slide">
                <img src="../images/Alur.png" class="w-full h-full " alt="Alur Pendaftaran">
            </div>

            <!-- Slide 3: FAQ -->
            <div class="swiper-slide">
                <img src="../images/faq.png" class="w-full h-full " alt="FAQ">
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
    <div class="container mx-auto mt-14 px-4">
        <div class="bg-transparent rounded-lg shadow-lg overflow-hidden">
            <div class="bg-transparent text-white py-4">
                <h1 class="text-center text-2xl font-bold mt-4">Jadwal Dokter</h1>
            </div>
            <div class="p-6">
                @if (count($semuaDokter) > 0)
                    <div class="overflow-x-auto">
                        <table id="dokterTable" class="min-w-full text-white">
                            <thead class="bg-transparent border-b">
                                <tr>
                                    <th class="py-2 px-1 text-left">Dokter</th>
                                    <th class="py-2 px-1 text-left">Jadwal</th>
                                    <th class="py-2 px-1 text-left"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($semuaDokter as $s)
                                    <tr class="border-black border-b border-t">
                                        <td class="py-4 px-4 transparent-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink">
                                                    @if ($s->image)
                                                        <img class="h-[100px] w-[100px] rounded-full object-cover"
                                                            src="{{ asset('storage/images/' . $s->image) }}"
                                                            alt="">
                                                    @else
                                                        <img class="h-[80px] w-[80px] rounded-full object-cover"
                                                            src="https://st3.depositphotos.com/6672868/13701/v/450/depositphotos_137014128-stock-illustration-user-profile-icon.jpg"
                                                            alt="">
                                                    @endif
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-lg text-white">
                                                        {{ $s->nama }}
                                                    </div>
                                                    <div class="text-lg text-gray-400">
                                                        {{ $s->poli->poli }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-1 px-1">
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
                    <p class="text-center text-white">Tidak ada data yang ditemukan.</p>
                @endif
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
    </script>
    <script>
        const doctors = @json($semuaDokter);
        const assetPath = "{{ asset('storage/images/') }}"; // Set asset path for images
    </script>
    <script type="application/json" id="doctor-data">
        @json($semuaDokter)
    </script>
    <script src="../js/datatables.js"></script>
    <script src="../js/swiper.js"></script>
</body>

</html>
