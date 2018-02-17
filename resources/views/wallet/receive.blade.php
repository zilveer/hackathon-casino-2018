@extends('layouts.app')

@section('title', 'Receive')

@section('contents')
    <style>
        #qrcode img {
            margin: auto;
        }
    </style>
    <div id="qrcode"></div>
@endsection

@section('scripts')
    <script type="text/javascript">
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: "{{ Uuid::generate() }}",
            width: 128,
            height: 128,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });
    </script>
@endsection