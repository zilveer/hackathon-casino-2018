@extends('layouts.app')

@section('title', 'Wallet Name')

@section('contents')
    <div class="card bg-light mb-3 text-center">
        <div class="card-header">Logo <small>{{ $wallet->id }}</small></div>
        <div class="card-body">
            <p class="card-text">Total : 12345 Pts</p>
        </div>
    </div>
@endsection
