<!DOCTYPE html>
<html>
<head>
    <title>QRCode</title>
    <script type="text/javascript" src="{{ asset('js/app.js', env('REDIRECT_HTTPS', true)) }}"></script>
</head>
<body>

<div id="qrcode"></div>

<script type="text/javascript">
    var qrcode = new QRCode(document.getElementById("qrcode"), {
        text: "goo.gl/fvLGH8",
        width: 128,
        height: 128,
        colorDark : "#000000",
        colorLight : "#ffffff",
        correctLevel : QRCode.CorrectLevel.H
    });
</script>
</body>
</html>
