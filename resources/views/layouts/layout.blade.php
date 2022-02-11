<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Amazing E-Book</title>
</head>

<body class="vh-100">
    <nav>
        <div style="background-color: #99ccff">
            <div class="container d-flex align-items-center justify-content-center">
                <p class="navbar-brand">
                <h1 class="display-2 my-5"><b>Amazing E-Book</b></h1>
                </p>
            </div>
        </div>
    </nav>

    <div class="container my-3">
        @yield('content')
    </div>

    <footer class="footer text-center fixed-bottom py-2" style="background-color: #99ccff">
        © <b>Amazing E-Book 2022 - Vincent Low</b>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
