@extends('layouts.app')

@section('header')
    <h1 class="text-center py-5">Bienvenue</h1>
@endsection

@section('content')
    <form action="{{ route('user.create') }}" class="form">
        <div class="form-group">
            <label>Votre nom</label>
            <input type="text" name="name" class="form-control" placeholder="Prénom Nom">
        </div>

        <div class="form-group">
            <label>Votre email</label>
            <input type="email" name="email" class="form-control" placeholder="foo@bar.com">
        </div>

        <button type="submit" class="btn btn-default btn-lg btn-block">Créer un compte</button>
    </form>
@endsection
