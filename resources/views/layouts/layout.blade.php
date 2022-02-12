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

<body class="d-flex flex-column vh-100">
    <nav>
        <div style="background-color: #99ccff">
            <div class="container d-flex align-items-center justify-content-center">
                <p class="navbar-brand">
                    <a href="/" class="text-decoration-none text-dark">
                        <h1 class="display-2 my-5"><b>Amazing E-Book</b></h1>
                    </a>
                </p>
            </div>
            <div class="text-center pb-3">
                @guest
                    <a href="/signup"><button class="btn btn-warning">{{ __('view.button.sign_up') }}</button></a>
                    <a href="/login"><button class="btn btn-warning">{{ __('view.button.login') }}</button></a>
                @endguest
                @auth
                    <a href="/logout"><button class="btn btn-warning">{{ __('view.button.logout') }}</button></a>
                @endauth
                <div class="position-absolute top-0 end-0 p-3">
                    <form action="/set_lang" method="POST">
                        @csrf
                        <select class="form-select" name="language" id="language" onchange="this.form.submit()">
                            <option value="" selected>{{__('view.change_language')}}</option>
                            <option value="ind">Bahasa Indonesia</option>
                            <option value="eng">English</option>
                        </select>
                    </form>
                </div>
            </div>
            @auth
                <div class="bg-warning list-unstyled d-flex p-2 text-dark align-items-center justify-content-evenly">
                    <div><a href="/" class="text-decoration-none text-dark"><b>{{ __('view.page_header.home') }}</b></a>
                    </div>
                    <div><a href="/cart"
                            class="text-decoration-none text-dark"><b>{{ __('view.page_header.cart') }}</b></a>
                    </div>
                    <div><a href="/profile"
                            class="text-decoration-none text-dark"><b>{{ __('view.page_header.profile') }}</b></a></div>
                    @if ($myRole == 'Admin')
                        <div><a href="/admins/accounts"
                                class="text-decoration-none text-dark"><b>{{ __('view.page_header.account_maintenance') }}</b></a>
                        </div>
                    @endif
                </div>
            @endauth
        </div>
    </nav>

    <div class="container my-3">
        @yield('content')
    </div>

    <footer class="footer text-center mt-auto sticky-bottom py-2" style="background-color: #99ccff">
        © <b>Amazing E-Book 2022 - Vincent Low</b>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
