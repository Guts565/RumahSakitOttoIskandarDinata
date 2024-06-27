<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Carousel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Edit Carousel</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form method="POST" action="{{ route('carousel.update', $carousel->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- <div class="form-group">
                <label for="dokter_id">Dokter</label>
                <select name="dokter_id" id="dokter_id" class="form-control" required>
                    @foreach ($dokters as $dokter)
                        <option value="{{ $dokter->id }}" {{ $carousel->dokter_id == $dokter->id ? 'selected' : '' }}>
                            {{ $dokter->nama }}
                        </option>
                    @endforeach
                </select>
            </div> --}}
            <div class="form-group">
                <label for="slide2">Gambar Slide 2</label>
                <input type="file" name="slide2" id="slide2" class="form-control">
            </div>
            <div class="form-group">
                <label for="slide3">Gambar Slide 3</label>
                <input type="file" name="slide3" id="slide3" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
