<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        body {
            background: linear-gradient(270deg, #763394, #a855f7, #007771, #9cc688, #4eb3ff, #6a329f, #c90076);
            background-size: 600% 600%;
            animation: gradient 90s ease infinite;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.25rem 0.5rem;
            margin: 0 0.25rem;
            border-radius: 0.25rem;
            color: #fff;
            background-color: #210962;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #2d3748;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: #2c5282;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            background-color: #a0aec0;
        }

        .dataTables_wrapper .dataTables_info {
            color: #ffffff;
        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            color: #000000;
            margin-top: 0.75rem;
        }

        .dataTables_wrapper .dataTables_filter input {
            border-radius: 0.25rem;
            border: 1px solid #868686;
            padding: 0.25rem 0.5rem;
            background-color: #edf2f7;
            margin-bottom: 0.75rem;
            margin-inline-start: 0.25rem
        }

        .hidden-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hidden-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .scroll-container {
            height: calc(100vh - 250px); /* Adjust based on your header and footer height */
            overflow-y: auto;
            /* overflow-x: hidden; */
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="container mx-auto mt-10 px-4">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-blue-900 text-white py-4">
                <h1 class="text-center text-2xl font-bold">Daftar Dokter</h1>
            </div>
            <div class="p-6">
                <a href="{{ url('/admin/create') }}" class=" bg-blue-500 text-white px-4 py-2 rounded-full pl-3"><i
                        class="fa-solid fa-user-plus"></i> Tambahkan data</a>
                @if (count($semuaDokter) > 0)
                    <div class="overflow-x-auto hidden-scrollbar scroll-container">
                        <table id="dokterTable" class="min-w-full bg-white border border-white-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-2 px-4 border-b">POLIKLINIK</th>
                                    <th class="py-2 px-4 border-b">Dokter</th>
                                    <th class="py-2 px-4 border-b">Senin</th>
                                    <th class="py-2 px-4 border-b">Selasa</th>
                                    <th class="py-2 px-4 border-b">Rabu</th>
                                    <th class="py-2 px-4 border-b">Kamis</th>
                                    <th class="py-2 px-4 border-b">Jum'at</th>
                                    <th class="py-2 px-4 border-b">Sabtu</th>
                                    <th class="py-2 px-4 border-b no-sort">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($semuaDokter as $s)
                                    <tr>
                                        <td class="py-2 px-4 border-b">{{ $s->poliklinik }}</td>
                                        <td class="py-2 px-4 border-b">{{ $s->nama }}</td>
                                        <td class="py-2 px-4 border-b">{{ $s->senin }}</td>
                                        <td class="py-2 px-4 border-b">{{ $s->selasa }}</td>
                                        <td class="py-2 px-4 border-b">{{ $s->rabu }}</td>
                                        <td class="py-2 px-4 border-b">{{ $s->kamis }}</td>
                                        <td class="py-2 px-4 border-b">{{ $s->jumat }}</td>
                                        <td class="py-2 px-4 border-b">{{ $s->sabtu }}</td>
                                        <td class="py-2 px-4 border-b">
                                            <div class="flex items-center space-x-2">
                                                <a href="{{ url('/dokter/' . $s->id) }}"
                                                    class="bg-blue-500 text-white px-3 py-1 rounded-full"><i
                                                        class="fas fa-info-circle"></i> Detail</a>
                                                <a href="{{ url('/dokter/' . $s->id . '/edit') }}"
                                                    class="bg-green-500 text-white px-3 py-1 rounded-full"><i
                                                        class="fas fa-edit"></i> Edit</a>
                                                <button type="button"
                                                    class="bg-red-500 text-white px-3 py-1 rounded-full delete-button"
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
                    <p class="text-center">Data kosong</p>
                @endif
            </div>
        </div>
    </div>

    <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50 hidden"
        id="confirmDeleteModal">
        <div class="bg-white rounded-lg overflow-hidden w-full max-w-lg mx-4 sm:mx-auto">
            <div class="bg-blue-900 text-white py-4 px-6">
                <h5 class="text-lg font-bold">Konfirmasi Penghapusan</h5>
            </div>
            <div class="p-6">
                Apakah Anda yakin ingin menghapus dokter ini?
            </div>
            <div class="flex justify-end p-6 space-x-2">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded-lg"
                        id="confirmDeleteButton">Ya, Hapus</button>
                </form>
                <button type="button" class="bg-gray-600 text-white py-2 px-4 rounded-lg"
                    id="cancelDeleteButton">Batal</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/js/all.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script> //buat delete multiple
        $(document).ready(function() {
            $('#dokterTable').DataTable({
                "columnDefs": [{
                    "targets": 'no-sort',
                    "orderable": false
                }],
                "language": {
                    "paginate": {
                        "previous": "Previous",
                        "next": "Next",
                    }
                }
            });

            $('.delete-button').click(function() {
                var dokterId = $(this).data('id');
                $('#deleteForm').attr('action', '{{ url('/dokter') }}/' + dokterId);
                $('#confirmDeleteModal').removeClass('hidden');
            });

            $('#cancelDeleteButton').click(function() {
                $('#confirmDeleteModal').addClass('hidden');
            });

            $('#deleteSelected').click(function() {
                var selecteddokter = [];
                $('input[name="selecteddokter[]"]:checked').each(function() {
                    selecteddokter.push($(this).val());
                });

                if (selecteddokter.length > 0) {
                    $('#confirmDeleteModal').removeClass('hidden');
                    $('#confirmDeleteModal').on('click', '#confirmDeleteButton', function() {
                        $.ajax({
                            url: '{{ route('dokter.deleteSelected') }}',
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                dokter_ids: selecteddokter
                            },
                            success: function(response) {
                                location.reload();
                            },
                            error: function(xhr) {
                                console.log(xhr.responseText);
                            }
                        });
                    });
                }
            });
        });
    </script>
</body>

</html>
