@extends('layouts.app')

@section('header')
    <h1 class="text-center py-5"><b>{{ $c = count($user->tokens) }}</b> jeton{{ $c == 1 ? '' : 's' }}</h1>
@endsection

@section('content')
    @foreach ($user->tokens->groupBy('brand')->map(function ($tokens) { return count($tokens); }) as $brand => $count)
        <div class="block p-3 mb-3">
            <div class="row">
                <div class="col-8">{{ $brand }}</div>
                <div class="col-4 text-right">{{ $count }}</div>
            </div>
        </div>
    @endforeach
@endsection
