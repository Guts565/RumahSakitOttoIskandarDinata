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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body class="font-sans">
    <!-- Jadwal Dokter -->
    <div class="container mx-auto mt-14 px-4">
        <div class="bg-transparent rounded-lg shadow-lg overflow-hidden">
            <div class="bg-transparent text-white py-4">
                <h1 class="text-center text-2xl font-bold mt-4">Jadwal Dokter</h1>
            </div>
            <div class="card-body">
                <a href="{{ url('/admin/create') }}" class=" bg-transparent text-white px-4 py-2 rounded-full pl-3"><i
                        class="fas fa-user-plus"></i> Tambahkan data</a>
                <div class="p-6">
                    @if (count($semuaDokter) > 0)
                        <div class="overflow-x-auto">
                            <table id="dokterTable" class="min-w-full min-h-full text-white">
                                <thead class="bg-transparent border-b">
                                    <tr>
                                        <th class="py-2 px-1 text-left">Dokter</th>
                                        <th class="py-2 px-1 text-left">Jadwal</th>
                                        <th class="py-2 pr-32 text-center">Aksi</th>
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
                                                            <img class="h-[100px] w-[100px] rounded-full object-cover"
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
                                            <td>
                                                <div class="btn-container">
                                                    <a href="{{ url('/dokter/' . $s->id) }}"
                                                        class="btn btn-transparent btn-rounded ms-1"><i
                                                            class="fas fa-info-circle"></i> Detail</a>
                                                    <a href="{{ url('/dokter/' . $s->id . '/edit') }}"
                                                        class="btn btn-transparent btn-rounded ms-1"><i
                                                            class="fas fa-edit"></i>
                                                        Edit</a>
                                                    <button type="button"
                                                        class="btn btn-transparent btn-rounded mx-2 delete-button"
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
                        <p class="text-center text-white">Tidak ada data i yang ditemukan.</p>
                    @endif
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
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
    </script>
    <script>
        const doctors = @json($semuaDokter);
    </script>
    <script type="application/json" id="doctor-data">
        @json($semuaDokter)
    </script>
    <script src="../js/datatables.js"></script>
    <script src="../js/swiper.js"></script>
</body>

</html>
