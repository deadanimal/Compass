<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Compass</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.2/sketchy/bootstrap.min.css" rel="stylesheet">
    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }
    </style>
    @yield('styles')

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
    @include('sweetalert::alert')
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <span class="fs-4">Compass</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link" href="/compass">Backpack</a></li>
                <li class="nav-item"><a class="nav-link" href="/friend">Phone</a></li>
                <li class="nav-item"><a class="nav-link" href="/token">Treasure Chest</a></li>
                <a href="/play"><button type="button" class="btn btn-success">Explore</button></a>
            </ul>
        </header>
    </div>

    <div class="container">
        @yield('content')
    </div>

    <footer class="mt-3 py-3 bg-light">
        <div class="container">
            <span class="text-muted">2022 &copy; Metaverse Compass Labs
                @role('admin')                    
                    <a href="/admin/lokasi">Lokasi</a> |
                    <a href="/admin/token">Token</a> | 
                    <a href="/admin/user">User</a> 
                @endrole
            </span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">    

    </script>
    @yield('scripts')
</body>

</html>
