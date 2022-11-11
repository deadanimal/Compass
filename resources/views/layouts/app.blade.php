<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Compass</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    @yield('styles')
</head>

<body>

    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <span class="fs-4">Compass</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link" href="/compass">Compass</a></li>
                <li class="nav-item"><a class="nav-link" href="/finance">Finance</a></li>
                <li class="nav-item"><a class="nav-link" href="/play">Play</a></li>
                @role('admin')
                    {{-- <li class="nav-item"><a class="nav-link" href="/admin/compass">Compass</a></li> --}}
                    <li class="nav-item"><a class="nav-link" href="/admin/lokasi">Lokasi</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="/admin/puzzle">Puzzle</a></li> --}}
                    <li class="nav-item"><a class="nav-link" href="/admin/token">Token</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/user">User</a></li>
                @endrole
            </ul>
        </header>
    </div>

    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    @yield('scripts')
</body>

</html>
