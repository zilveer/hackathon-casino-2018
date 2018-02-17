@extends('layouts.app')

@section('contents')

    <h1>Users</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Wallets</th>
                <th>Tokens</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><a href="{{ route('user.wallets', $user) }}">{{ count($user->wallets) }}</a></td>
                    <td>{{ $user->tokens_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
