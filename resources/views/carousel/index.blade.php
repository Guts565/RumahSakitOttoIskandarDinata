<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alur & FAQ</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="w-screen h-screen flex">
    <div class="container h-full mx-auto mt-[1rem] mb-[4rem] px-4 custom-hidden">
        <h1 class="font-bold text-center text-lg">Alur & FAQ</h1>
        <a href="{{ route('carousel.create') }}" class="btn btn-primary mb-3 text-end">Create Carousel</a>
        @if (session('success'))
            <div id="successMessage" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered flex item-center justify-center ">
            <thead>
                <tr>
                    <th>Alur</th>
                    <th>FAQ</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carousels as $c)
                    <tr>
                        <td><img class="w-full h-full" src="{{ asset('storage/carousel/' . $c->slide2) }}"
                                alt="Slide 2" >
                        </td>
                        <td><img class="w-full h-full" src="{{ asset('storage/carousel/' . $c->slide3) }}"
                                alt="Slide 3">
                        </td>

                        <td>
                            <div class="flex space-x-4 text-center item-center justify-center">
                                <a href="{{ route('carousel.edit', $c->id) }}"
                                    class="btn btn-transparent btn-rounded text-black"><i
                                        class="fas fa-info-circle"></i>Edit</a>
                                <form action="{{ route('carousel.destroy', $c->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn btn btn-transparent btn-rounded text-black text-center"
                                        onclick="return confirm('Hapus Alur & FAQ?')">
                                        <i class="fas fa-trash-alt"></i>Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-2 pb-8 text-end">

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
