@extends('layouts.app')

@section('header')
    <h1 class="text-center py-5">{{ $user->name }}</h1>
@endsection

@section('content')
    <div class="card mb-3">
        <div id="qrcode" class="p-3"></div>
    </div>

    <p class="text-center">{{ $c = count($user->tokens) }} jeton{{ $c == 1 ? '' : 's' }}</p>
@endsection

@section('scripts')
    <script type="text/javascript">
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: "{{ route('user.transfer', compact('user')) }}",
            width: 512,
            height: 512,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });
    </script>
@endsection

