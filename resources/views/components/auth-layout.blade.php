<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aset/color-palete.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aset/alert.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aset/loading.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/auth/style-login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/auth/style-forgot-password.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/auth/style-reset-password.css') }}">
    <link rel="stylesheet" href="{{  asset('assets/css/auth/style-verif.css') }}">
    <link rel="icon" href="{{ asset('assets/image/logo-1.png') }}">
    <title>{{ $title }}</title>
</head>
<body>
<x-alert />
<x-loading-screen />

    {{ $slot }}


<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src={{ asset('assets/js/script-action.js') }}></script>
<script src={{ asset('assets/js/script-animation.js') }}></script>
<script src="{{ asset('assets/js/script-button.js') }}"></script>
<script src="{{ asset('assets/js/script-popup.js') }}"></script>
<script src="{{ asset('assets/js/script-alert.js') }}"></script>
</body>
</html>
