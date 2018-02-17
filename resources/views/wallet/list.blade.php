@extends('layouts.app')

@section('title', 'Wallets')

@section('contents')
    <h3 class="text-center font-weight-bold p-4">2765 Pts</h3>
    <div class="card bg-light mb-3">
        <div class="card-body">
            @foreach($wallets as $wallet)
                <a href="{{ route('user.wallet', ['wallet' => $wallet, 'user' => $user]) }}" style="text-decoration: none">
                    <div class="list-group">
                        <div class="list-group-item list-group-item-action flex-column align-items-start mb-2">
                            <div class="d-flex w-100 justify-content-between">
                                <h5>Image</h5>
                                <h5>Wallet Name</h5>
                                <h5>22 Pts</h5>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <div class="text-center pt-4">
        <a href="{{ route('wallet.receive', $user) }}"><button type="button" class="btn btn-primary btn-lg">Acheter</button></a>
        <a href="{{ route('wallet.send', $user) }}"><button type="button" class="btn btn-secondary btn-lg">Payer</button></a>
    </div>
@endsection
