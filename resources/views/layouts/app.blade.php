<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css', env('REDIRECT_HTTPS', true)) }}">
</head>
<body>
    <main role="main" class="container">
        <header>
            @yield("header")
        </header>

        <section id="content">
            @yield("content")
        </section>

        @if (isset($user))
            <footer class="text-center py-3 fixed-bottom">
                <div class="container">
                    @section('footer')
                        <div class="row no-gutters">
                            <div class="col-4 pr-2">
                                <a href="{{ route('user.receive', $user) }}" class="btn btn-default btn-lg btn-block {{ Route::currentRouteName() == 'user.receive' ? 'active' : '' }}">Recevoir</a>
                            </div>
                            <div class="col-4">
                                <a href="{{ route('user.view', $user) }}" class="btn btn-default btn-lg btn-block {{ Route::currentRouteName() == 'user.view' ? 'active' : '' }}">Details</a>
                            </div>
                            <div class="col-4 pl-2">
                                <a href="{{ route('user.send', $user) }}" class="btn btn-default btn-lg btn-block {{ Route::currentRouteName() == 'user.send' ? 'active' : '' }}">Payer</a>
                            </div>
                        </div>
                    @show
                </div>
            </footer>
        @endif
    </main>

    <script src="{{ asset('js/app.js', env('REDIRECT_HTTPS', true)) }}"></script>

    @yield('scripts')
</body>
</html>
