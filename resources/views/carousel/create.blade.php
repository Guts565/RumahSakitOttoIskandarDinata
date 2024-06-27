<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Carousel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Create Carousel</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form method="POST" action="{{ route('carousel.store') }}" enctype="multipart/form-data">
            @csrf
            {{-- <div class="form-group">
                <label for="dokter_id">Dokter</label>
                <select name="dokter_id" id="dokter_id" class="form-control" required>
                    @foreach ($carousel as $c)
                        <option value="{{ $c->id }}">{{ $c->nama }}</option>
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
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
