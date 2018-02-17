@extends('layouts.app')

@section('title', 'Portefeuille')

@section('contents')
    <div class="card bg-light mb-3">
        <div class="card-header text-center text-muted">
            <small>{{ $wallet->name }}</small>
        </div>

        <div class="card-body">
            <div class="card-text">
                @foreach ($wallet->coins->groupBy('currency_id') as $currency_id => $group)
                    <div class="row mb-2">
                        <div class="col-8">{{ App\Models\Currency::find($currency_id)->name }}</div>
                        <div class="col-4 text-right">@money($group->sum('amount')) @coin(24)</div>
                    </div>
                @endforeach

                <hr>

                <div class="row">
                    <div class="col-8"><b>Total</b></div>
                    <div class="col-4 text-right">
                        <b>@money($wallet->coins()->sum('amount')) @coin(24)</b>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('user.wallets', $user) }}" class="btn btn-secondary btn-block btn-lg">Retour</a>
    <div class="spacer py-5 mb-5">-</div>

    <div class="text-center pb-3 fixed-bottom">
        <div class="container bg-light">
            <div class="row">
                <div class="col-6">
                    <a href="{{ route('wallet.receive', compact('user', 'wallet')) }}" class="btn btn-primary btn-lg btn-block py-5">Recevoir</a>
                </div>
                <div class="col-6">
                    <a href="{{ route('wallet.send', compact('user', 'wallet')) }}" class="btn btn-danger btn-lg btn-block py-5">Payer</a>
                </div>
            </div>
        </div>
    </div>
@endsection
