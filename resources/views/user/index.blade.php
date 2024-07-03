<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="font-poppins">
    <div class="container h-full mx-auto mt-[1rem] mb-[4rem] px-4 custom-hidden">
        <h1 class="font-bold text-center text-lg">Users</h1>
        <a href="{{ url('/user/create') }}" class="btn btn-transparent btn-rounded mb-2"><i
                class="fas fa-user-plus"></i>Tambahkan User</a>
        @if (session('success'))
            <div id="successMessage" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
                    <tr>
                        <td>
                            <div class="ml-4 custom-hidden">
                                <div class="text-lg text-black">
                                    {{ $u->username }}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="text-lg text-black">
                                {{ $u->password }}
                            </div>
                        </td>
                        <td>
                            <div class="flex space-x-4">
                                <a href="{{ url('/user/' . $u->id . '/edit') }}"
                                    class="btn btn-transparent btn-rounded text-black"><i
                                        class="fas fa-info-circle"></i>Edit</a>
                                <form action="{{ url('/user/' . $u->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn btn-transparent btn-rounded text-black"
                                        onclick="return confirm('Hapus User?')">
                                        <i class="fas fa-trash-alt"></i>Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-8 pt-3 text-end">

            <!-- Tombol Kembali -->
            <a href="{{ url('/admin') }}">
                <input type="button"
                    class="middle none rounded-lg bg-gray-900 py-2 px-14 text-center align-middle text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    value="Back">
            </a>
        </div>
    </div>
    <script>
        // Menghilangkan pesan setelah 5 detik
        setTimeout(function() {
            document.getElementById('successMessage').style.display = 'none';
        }, 5000); // Waktu dalam milidetik (misalnya 5000 untuk 5 detik)
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
