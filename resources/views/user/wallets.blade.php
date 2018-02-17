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
                <th>Coins</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($wallets as $wallet)
                <tr>
                    <td><a href="{{ route('wallet.qrcode', compact('wallet')) }}">{{ $wallet->id }}</a></td>
                    <td><a href="{{ route('user.coins', compact('user', 'wallet')) }}">{{ count($wallet->coins) }}</a></td>
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
