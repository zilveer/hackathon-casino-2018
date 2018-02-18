@extends('layouts.app')

@section('title', 'Envoyer')

@section('contents')
    <div class="card mb-3">
        <p class="card-text text-center bg-light">
            Pour envoyer des devises, scannez le <b>QR code</b> de la personne à qui vous voulez les envoyer
        </p>
    </div>


    <a href="{{ route('user.wallet', compact('user', 'wallet')) }}" class="btn btn-secondary btn-lg btn-block">Retour</a>
@endsection

