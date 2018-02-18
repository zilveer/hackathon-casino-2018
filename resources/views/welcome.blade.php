@extends('layouts.app')

@section('header')
    <h1 class="text-center py-5">Bienvenue</h1>
@endsection

@section('content')
    <a href="{{ route('user.create') }}" class="btn btn-default btn-lg btn-block">Créer un compte</a>
@endsection
