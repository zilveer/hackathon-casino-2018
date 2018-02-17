<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coins</title>
</head>
<body>
    <h1>{{ $user->name }}</h1>
    <h2>Wallet {{ $wallet->id }}</h2>

    <hr>
    <h3>Coins</h3>

    @foreach ($coin as $coin)
        <h4>{{ $coin }}</h4>
    @endforeach
</body>
</html>
