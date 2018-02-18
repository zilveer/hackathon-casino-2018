@extends('layouts.app')

@section('header')
    <h1 class="text-center py-5">Payer <u id="tokens" contenteditable class="font-weight-bold">10</u> jetons</h1>
@endsection

@section('content')
    <div class="card mb-3 text-center p-1">
        <div class="embed-responsive embed-responsive-16by9">
            <video class="embed-responsive-item" id="preview"></video>
        </div>
    </div>
    <p class="text-center" id="help">Scannez un code</p>

    <a href="#" id="send" class="btn btn-default btn-lg btn-block" style="display: none">Envoyer</a>
@endsection

@section('scripts')
    <script type="text/javascript">
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

        scanner.addListener('scan', function (content) {
            $('#help').remove();

            $('#preview')
                .parent()
                .replaceWith('<h3 class="text-success font-weight-bold py-5 mb-0">OK</h3>');

            $('#send')
                .show()
                .attr('href', content + '?tokens=' + $('#tokens').text() + '&from={{ $user->id }}');
        });

        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                throw 'Pas de caméra...';
            }
        }).catch(function (e) {
            alert(e);
        });
    </script>
@endsection
