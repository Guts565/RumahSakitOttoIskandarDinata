<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Login #7</title>
</head>
<style>
    body {
        font-family: Helvetica, ;
        background: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .register-form {
        background: #fff;
        padding: 80px;
        width: 300px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-control {
        margin-bottom: 20px;
    }

    .form-control h5 {
        margin-bottom: 5px;
    }

    .form-control input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .form-control button {
        width: 108%;
        padding: 10px;
        border: none;
        background-color: #50CAFF;
        color: white;
        border-radius: 4px;
        cursor: pointer;
    }

    .form-control button:hover {
        background-color: #0d95e8;
    }

    .text-danger {
        color: red;
        /* Ganti 'red' dengan warna yang Anda inginkan */
    }
</style>

<body>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="row justify-content-center ">
                        <img src="img/icon/scholib.png" alt="Image" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-6 contents ">
                    <div class="row justify-content-center ">
                        <div class="col-md-20 mt-3 ">
                            <div class="mb-2">
                                <h1>Log In</h1>
                                <p class="mb-4"></p>
                            </div>
                            <form action="/auth" method="post">
                                @csrf
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        value="{{ old('username') }}" placeholder="Enter your username" autofocus
                                        required>

                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        value="{{ old('password') }}" placeholder="Enter your password" required>
                                </div>
                                <input type="submit" value="Log In" class="btn btn-block btn-primary" name="login">
                            </form><br>
                            @if (session('message_fail'))
                                <div class="alert alert-danger">
                                    {{ session('message_fail') }}
                                </div>
                            @elseif (session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
