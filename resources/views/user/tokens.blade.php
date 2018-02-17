<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tokens</title>
</head>
<body>
    <h1>{{ $user->name }}</h1>
    <h2>Wallet {{ $wallet->id }}</h2>

    <hr>

    <h3>Tokens</h3>

    @foreach ($tokens as $token)
        <h4>{{ $token->id }}</h4>

        @if ($token->data)
            <pre><code>{{ json_encode($token->data, JSON_PRETTY_PRINT) }}</code></pre>
        @endif
    @endforeach
</body>
</html>
