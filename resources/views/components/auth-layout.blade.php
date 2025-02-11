<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/color/color-palete.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/auth/style-login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/auth/style-forgot-password.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/auth/style-reset-password.css') }}">
    <link rel="stylesheet" href="{{  asset('assets/css/auth/style-verif.css') }}">
    <link rel="icon" href="{{ asset('assets/image/logo-1.png') }}">
    <title>{{ $title }}</title>
</head>
<body>

    {{ $slot }}

<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="{{ asset('assets/js/script-button.js') }}"></script>
<script src="{{ asset('assets/js/script-popup.js') }}"></script>
</body>
</html>
