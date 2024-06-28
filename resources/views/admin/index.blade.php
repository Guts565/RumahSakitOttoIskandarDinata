<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Dokter</title>
    <link href="/css/style.css" rel="stylesheet">
    <script defer src="/js/animation.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="font-sans custom-hidden">

    <!-- Carousel -->
    <div class="swiper custom-hidden">
        {{-- <div class="swiper-wrapper h-64 sm:h-72 md:h-96 lg:h-[800px]"> --}}
        <div class="swiper-wrapper">
            <!-- Slide 1: Profile Dokter -->
            <div class="swiper-slide flex flex-wrap items-center justify-center h-full w-full" id="slide-doctor">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-2 w-full">
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
                            <img class="h-96 w-96 rounded mx-auto object-cover " id="doctor-img-{{ $i }}"
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
            <div class="swiper-slide">
                <img src="{{ asset('storage/carousel/' . $carousels->slide2) }}" class="w-full h-full object-cover "
                    alt="Alur Pendaftaran">
            </div>

            <!-- Slide 3: FAQ -->
            <div class="swiper-slide">
                <img src="{{ asset('storage/carousel/' . $carousels->slide3) }}" class="w-full h-full object-cover "
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

    <div class="container mx-auto mt-16 mb-16 px-4 custom-hidden">
        <div class="bg-transparent rounded-lg shadow-lg overflow-hidden">
            <div class="bg-transparent text-white py-4">
                <h1 class="text-center text-2xl font-bold mt-4">Jadwal Dokter</h1>
            </div>
            <div class="card-body">
                <a href="{{ url('/admin/create') }}" class=" bg-transparent text-white px-4 py-2 rounded-full pl-3"><i
                        class="fas fa-user-plus"></i>
                    Tambahkan data</a>
                <div class="p-6">
                    @if (count($semuaDokter) > 0)
                        <div class="overflow-x-auto">
                            <table id="dokterTable" class="min-w-full min-h-full text-white ">
                                <thead class="bg-transparent border-b custom-hidden">
                                    <tr>
                                        <th class="py-2 px-12 text-left">Dokter</th>
                                        <th class="py-2 px-1 text-left">Jadwal</th>
                                        <th class="py-2 pr-32 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="custom-hidden">
                                    @foreach ($semuaDokter as $s)
                                        <tr class="border-black border-b border-t">
                                            <td class="py-4 px-4 transparent-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink custom-hidden">
                                                        @if ($s->image)
                                                            <img class="h-[120px] w-[120px] rounded-full object-cover"
                                                                src="{{ asset('storage/images/' . $s->image) }}"
                                                                alt="">
                                                        @else
                                                            <img class="h-[120px] w-[120px] rounded-full object-cover"
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
                                            <td class="custom-hidden">
                                                <div class="btn-container">
                                                    <a href="{{ url('/dokter/' . $s->id) }}"
                                                        class="btn btn-transparent btn-rounded text-white"><i
                                                            class="fas fa-info-circle"></i> Detail</a>
                                                    <a href="{{ url('/dokter/' . $s->id . '/edit') }}"
                                                        class="btn btn-transparent btn-rounded text-white"><i
                                                            class="fas fa-edit"></i>
                                                        Edit</a>
                                                    <button type="button"
                                                        class="btn btn-transparent btn-rounded delete-button text-white"
                                                        data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                                                        data-id="{{ $s->id }}"><i class="fas fa-trash-alt"></i>
                                                        Delete</button>
                                                </div>
                                            </td>
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
    </div>
    <!-- Jadwal Dokter -->

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus dokter ini?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

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
