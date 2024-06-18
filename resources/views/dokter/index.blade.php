<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Dokter</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/css/tw-elements.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
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
    <style>
        /* @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 50% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        } */

        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        body {
            /* background: linear-gradient(270deg, #763394, #bca900, #5e1515, #1d085a, #0a4a1f, #6a329f, #c90076); */
            background: linear-gradient(270deg, #4400ff, #0f172a);
            /* background: #000000; */
            background-size: 600% 600%;
            /* animation: gradient 80s ease infinite; */
        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            color: #ffffff;
            margin-top: 0.75rem;
            padding-top: 0.5rem
        }

        .dataTables_wrapper .dataTables_filter input,
        .dataTables_wrapper .dataTables_length select {
            border-radius: 1rem;
            border: 0.5px solid #8f8f8f;
            padding: 0.25rem 0.5rem;
            background-color: #ffffff00; /* Warna abu-abu */
            color: #ffffff; /* Warna font hitam */
            margin-bottom: 0.5rem;
            /* padding-bottom: 0.5rem */
            margin-inline-start: 0.25rem;
        }

        .dataTables_wrapper .dataTables_info {
            color: #ffffff;
            padding-bottom: 1rem;
            padding-top: 0.5rem;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.5rem 0.5rem;
            margin: 0 0.25rem;
            border-radius: 0.25rem;
            color: #fff;
            background-color: #21096200;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #178e2b;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: #3081e5;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            background-color: #404040;
        }

        .hidden-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hidden-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .scroll-container {
            height: calc(100vh - 250px);
            overflow-y: auto;
        }
    </style>

</head>

<body>
    <div class="container mx-auto mt-10 px-4">
        <div class="bg-gray rounded-lg shadow-lg overflow-hidden">
            <div class="bg-blue-0 text-white py-4">
                <h1 class="text-center text-2xl font-bold">Jadwal Dokter</h1>
            </div>
            <div class="p-6">
                {{-- <a href="{{ url('/admin/create') }}" class="transition delay-150 duration-300 ease-in-out bg-blue-0 text-white px-4 py-2 rounded-full pl-3"><i
                        class="fa-solid fa-user-plus"></i> Tambahkan data</a> --}}
                @if (count($semuaDokter) > 0)
                    <table id="dokterTable" class="min-w-full table-fixed text-white">
                        <thead class="bg-gray-0 ">
                            <tr>
                                <th class="py-2 px-4  text-left">POLIKLINIK</th>
                                <th class="py-2 px-4  text-left">Dokter</th>
                                <th class="py-2 px-4  text-left">Senin</th>
                                <th class="py-2 px-4  text-left">Selasa</th>
                                <th class="py-2 px-4  text-left">Rabu</th>
                                <th class="py-2 px-4  text-left">Kamis</th>
                                <th class="py-2 px-4  text-left">Jum'at</th>
                                <th class="py-2 px-4  text-left">Sabtu</th>
                                {{-- <th class="py-2 px-4  no-sort ">Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($semuaDokter as $s)
                                <tr>
                                    <td class="py-2 px-4 ">{{ $s->poliklinik }}</td>
                                    <td class="py-2 px-4 ">{{ $s->nama }}</td>
                                    <td class="py-2 px-4 ">{{ $s->senin }}</td>
                                    <td class="py-2 px-4 ">{{ $s->selasa }}</td>
                                    <td class="py-2 px-4 ">{{ $s->rabu }}</td>
                                    <td class="py-2 px-4 ">{{ $s->kamis }}</td>
                                    <td class="py-2 px-4 ">{{ $s->jumat }}</td>
                                    <td class="py-2 px-4 ">{{ $s->sabtu }}</td>
                                    {{-- <td class="py-2 px-4  ">
                                        <div class="flex justify-end items-center space-x-2">
                                            <a href="{{ url('/dokter/' . $s->id) }}"
                                                class="bg-blue-0 text-white px-3 py-1 rounded-full"><i
                                                    class="fas fa-info-circle"></i> Detail</a>
                                            <a href="{{ url('/dokter/' . $s->id . '/edit') }}"
                                                class="bg-green-0 text-white px-3 py-1 rounded-full"><i
                                                    class="fas fa-edit"></i> Edit</a>
                                            <button type="button"
                                                class="bg-red-0 text-white px-3 py-1 rounded-full delete-button"
                                                data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                                                data-id="{{ $s->id }}"><i class="fas fa-trash-alt"></i>
                                                Delete</button>
                                        </div>
                                    </td> --}}
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
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/js/tw-elements.umd.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/js/all.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        //buat delete multiple
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
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.min.js"></script>
</body>

</html>
