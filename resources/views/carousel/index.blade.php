<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carousel List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Carousel</h1>
        <a href="{{ route('carousel.create') }}" class="btn btn-primary mb-3 text-end">Create Carousel</a>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Slide 2</th>
                    <th>Slide 3</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carousels as $c)
                    <tr>
                        <td><img src="{{ asset('storage/carousel/' . $c->slide2) }}" alt="Slide 2" width="100">
                        </td>
                        <td><img src="{{ asset('storage/carousel/' . $c->slide3) }}" alt="Slide 3" width="100">
                        </td>
                        <td>
                            <a href="{{ route('carousel.edit', $c->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('carousel.destroy', $c->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
