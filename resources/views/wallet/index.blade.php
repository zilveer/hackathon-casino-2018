@extends('layouts.app')

@section('title', 'Mes Portefeuilles')

@section('contents')
    <h3 class="text-center font-weight-bold py-4">
        <small class="text-muted text-uppercase">Total:</small> @money($user->coins_count) @coin(24)
    </h3>

    <div class="card bg-light">
        <div class="card-body">
            @foreach($wallets as $wallet)
                <a href="{{ route('user.wallet', ['wallet' => $wallet, 'user' => $user]) }}" style="text-decoration: none">
                    <div class="list-group">
                        <div class="list-group-item list-group-item-action flex-column align-items-start mb-2">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-0">{{ $wallet->name }}</h5>
                                <h5 class="mb-0">@money($wallet->coins()->sum('amount')) @coin(16)</h5>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
