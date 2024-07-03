<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Dokter</title>
    <link rel="icon" type="image/png" href="images/logo.png">
    <link href="/css/style.css" rel="stylesheet">
    <script src="/js/animation.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Material Icons Link -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="w-screen h-screen custom-hidden">
    @if (session('success'))
        <div id="successMessage" class="alert alert-success" >
            {{ session('success') }}
        </div>
    @endif
    <div id="top"></div>
    <nav
        class="sticky top-0 z-10 block w-full max-w-full px-4 py-2 text-white bg-neutral-200 rounded-sm shadow-lg h-max bg-opacity-100 backdrop-blur-2xl backdrop-saturate-200 lg:px-8 lg:py-4 custom-hidden">
        <div class="flex items-center justify-between text-blue-gray-900 custom-hidden">
            <a href="#top" id="logo-link">
                <img src="images/logo.png" alt="Logo" id="logo">
            </a>
            <a href="#top">
                <p class="mr-[67rem] font-bold text-lg">Admin Dashboard</p>
            </a>
            <div class="flex items-center gap-4">
                <div class="hidden mr-4 lg:block mt-3">
                    <ul class="flex flex-col gap-2 mt-2 mb-4 lg:mb-0 lg:mt-0 lg:flex-row lg:items-center lg:gap-6">
                        <li class="block p-1 text-md antialiased font-normal leading-normal text-blue-gray-900">
                            <a href="{{ url('/user') }}" class="flex items-center">
                                Akun Admin
                            </a>
                        </li>
                        <li class="block p-1 text-md antialiased font-normal leading-normal text-blue-gray-900">
                            <a href="{{ url('/carousel') }}" class="flex items-center">
                                FAQ & Alur Slide
                            </a>
                        </li>
                        <li class="block p-1 text-md antialiased font-normal leading-normal text-blue-gray-900">
                            <a href="{{ url('/poli') }} " class="flex items-center">
                                Tambah Poliklinik
                            </a>
                        </li>
                        {{-- <li
                            class="block p-1 text-md antialiased font-normal leading-normal text-blue-gray-900">
                            <a href="#" class="flex items-center">
                                Docs
                            </a>
                        </li> --}}
                    </ul>
                </div>
                <div class="flex items-center gap-x-1">
                    {{-- <button
                        class="hidden px-4 py-2 text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:inline-block"
                        type="button">
                        <span>Log In</span>
                    </button> --}}
                    <button onclick="location.href='{{ url('/logout') }}'"
                        class="rounded-lg bg-gradient-to-tr from-gray-900 to-gray-800 py-2 px-4 text-center align-middle text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:inline-block"
                        type="button">
                        <span>Logout</span>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <div id="content">
        {{-- <div class="swiper-wrapper h-64 sm:h-72 md:h-96 lg:h-[800px]"> --}}
        <!-- Carousel -->
        {{-- <div class="swiper custom-hidden-slide flex h-screen w-screen">
            <div class="swiper-wrapper">
                <!-- Slide 1: Profile Dokter -->
                <div class="swiper-slide flex items-center justify-center h-full w-full" id="slide-doctor">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 w-full item-center justify-center"
                        id="doctor-grid">

                    </div>
                </div>
                <!-- Slide 2: Alur Pendaftaran -->
                <div class="swiper-slide">
                    <img src="{{ asset('storage/carousel/' . $carousels->slide2) }}" class="w-full h-full object-fit "
                        alt="Alur Pendaftaran">
                </div>

                <!-- Slide 3: FAQ -->
                <div class="swiper-slide">
                    <img src="{{ asset('storage/carousel/' . $carousels->slide3) }}" class="w-full h-full object-fit "
                        alt="FAQ">
                </div>
            </div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div> --}}

        <!-- Jadwal Dokter -->
        <div class="container h-full mx-auto mt-[1rem] mb-[4rem] px-4 custom-hidden">
            <div class="bg-transparent rounded-lg shadow-lg overflow-hidden">
                <div class="bg-transparent text-white py-4">
                </div>
                <div class="card-body">
                    <h1 class="text-center text-white text-2xl font-bold mb-4">Jadwal Dokter</h1>
                    <a href="{{ url('/admin/create') }}"
                        class=" bg-transparent text-white px-4 py-2 rounded-full pl-3"><i class="fas fa-user-plus"></i>
                        Tambahkan data</a>
                    <div class="p-6">
                        @if (count($semuaDokter) > 0)
                            <div class="overflow-x-auto">
                                <table id="dokterTable" class="min-w-full min-h-full text-white ">
                                    <thead class="bg-transparent border-b custom-hidden">
                                        <tr>
                                            <th class="py-2 px-16 text-left">Dokter</th>
                                            <th class="py-2 px-1 text-left">Jadwal</th>
                                            <th class="py-2 pr-[5rem] text-center">Aksi</th>
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
                                                <td class="py-4 px-4 custom-hidden">
                                                    <div class="flex space-x-4">
                                                        <a href="{{ url('/dokter/' . $s->id) }}"
                                                            class="btn btn-transparent btn-rounded text-white"><i
                                                                class="fas fa-info-circle"></i> Detail</a>
                                                        <a href="{{ url('/dokter/' . $s->id . '/edit') }}"
                                                            class="btn btn-transparent btn-rounded text-white"><i
                                                                class="fas fa-edit"></i>
                                                            Edit</a>
                                                        <button type="button"
                                                            class="btn btn-transparent btn-rounded delete-button text-white"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#confirmDeleteModal"
                                                            data-id="{{ $s->id }}"><i
                                                                class="fas fa-trash-alt"></i>
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
    </div>

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
    <script>
        // Menghilangkan pesan setelah 5 detik
        setTimeout(function() {
            document.getElementById('successMessage').style.display = 'none';
        }, 1000); // Waktu dalam milidetik (misalnya 5000 untuk 5 detik)
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/script-name.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
    </script>
    <script>
        const doctors = @json($semuaDokter);
        const polis = @json($polis);
        const assetPath = "{{ asset('storage/images/') }}"; // Set asset path for images
    </script>
    {{-- <script type="application/json" id="doctor-data">
        @json($semuaDokter)
    </script> --}}
    <script src="/js/datatables.js"></script>
    {{-- <script src="/js/swiper.js"></script> --}}
</body>

</html>
