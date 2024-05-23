<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-fRRfIk6y9XJRMJYs+3AR1NVehx6f2x//aJSQkTak9qIoHqC2WzSfJSFb2mxuvPViCHdUW+QfGdIzC74ZvV9Vug=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
        }

        .card {
            border-radius: 20px;
        }

        .card-body {
            padding: 20px;
        }

        .btn-rounded {
            border-radius: 20px;
        }

        .btn-container {
            display: flex;
            gap: 5px;
        }

        .btn-container .btn {
            flex: 1;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Daftar Siswa</h1>
            </div>
            <div class="card-body">
                @if (count($semuaSiswa) > 0)
                    <table id="siswaTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th class="no-sort">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($semuaSiswa as $s)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $s->nama }}</td>
                                    <td>{{ $s->alamat }}</td>
                                    <td>{{ $s->no_telp }}</td>
                                    <td>
                                        <div class="btn-container">
                                            <a href="{{ url('/siswa/' . $s->id) }}"
                                                class="btn btn-primary btn-rounded ms-1"><i
                                                    class="fas fa-info-circle"></i> Detail</a>
                                            <a href="{{ url('/siswa/' . $s->id . '/edit') }}"
                                                class="btn btn-success btn-rounded ms-1"><i class="fas fa-edit"></i>
                                                Edit</a>
                                            <button type="button" class="btn btn-danger btn-rounded ms-1 delete-button"
                                                data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                                                data-id="{{ $s->id }}"><i class="fas fa-trash-alt"></i>
                                                Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center">Data kosong</p>
                @endif
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penghapusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus siswa ini?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#siswaTable').DataTable({
                    "columnDefs": [{
                        "targets": 'no-sort', // Gunakan kelas no-sort untuk kolom yang tidak ingin disortir
                        "orderable": false
                    }]
                });

                $('.delete-button').click(function() {
                    var studentId = $(this).data('id');
                    $('#deleteForm').attr('action', '{{ url('/siswa') }}/' + studentId);
                });
            });
        </script>
</body>

</html>
