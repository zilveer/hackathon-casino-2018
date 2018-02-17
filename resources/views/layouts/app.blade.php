<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/app.css', env('REDIRECT_HTTPS', true)) }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">{{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Accueil</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Coins</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Payer</a>
                    </li>

                    {{--
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    --}}
                </ul>
            </div>
        </div>
    </nav>

    <main role="main" class="container">
        <h1 class="text-center font-weight-bold text-uppercase p-4">@yield('title')</h1>
        @section("contents")
        @show
    </main>

    <script src="{{ asset('js/app.js', env('REDIRECT_HTTPS')) }}"></script>
    @yield('scripts')
</body>
</html>
