@extends('layouts.app')

@section('title', 'Scan')

@section('contents')
    <div class="card mb-3">
        <p class="card-text text-center bg-light">
            Pour envoyer de l'argent à <b>{{ $user->name }}</b>,<br>
            scannez ce code avec votre portable.
        </p>
    </div>

    <div class="card mb-3">
        <div id="qrcode" class="p-3"></div>
    </div>

    <a href="{{ route('user.wallet', compact('user', 'wallet')) }}" class="btn btn-secondary btn-lg btn-block">Retour</a>
@endsection

@section('scripts')
    <script type="text/javascript">
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: "{{ Uuid::generate() }}",
            width: 512,
            height: 512,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });
    </script>
@endsection
