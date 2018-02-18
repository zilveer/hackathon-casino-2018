<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/app.css', env('REDIRECT_HTTPS', true)) }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <style type="text/css">
        body {
            background: -webkit-linear-gradient(43deg, rgb(231, 60, 126), rgb(37, 166, 213));
            background: linear-gradient(43deg, rgb(231, 60, 126), rgb(37, 166, 213));
        }
    </style>
</head>
<body>

</body>
</html>
