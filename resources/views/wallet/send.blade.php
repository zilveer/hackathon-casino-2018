@extends('layouts.app')

@section('title', 'Acheter')

@section('contents')
    <div class="text-center">
        <div class="embed-responsive embed-responsive-1by1">
            <video class="embed-responsive-item" id="preview"></video>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
        scanner.addListener('scan', function (content) {
            console.log(content);
        });
        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
            }
        }).catch(function (e) {
            console.error(e);
        });
    </script>
@endsection
