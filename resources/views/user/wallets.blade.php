<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wallets</title>
</head>
<body>
    <h1>{{ $user->name}} wallets</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tokens</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($wallets as $wallet)
                <tr>
                    <td>{{ $wallet->id }}</td>
                    <td><a href="{{ route('user.tokens', compact('user', 'wallet')) }}">{{ count($wallet->tokens) }}</a></td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td>Total</td>
                <td>{{ $user->tokens_count }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
