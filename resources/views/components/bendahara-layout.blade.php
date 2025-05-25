<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/aset/color-palete.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aset/alert.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bendahara/style-beranda-bendahara.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bendahara/style-sidebar-bendahara.css') }}">
    <link rel="icon" href="{{ asset('assets/image/logo-1.png') }}">
    <title>{{ $title }}</title>
</head>
<body>
<x-sidebar-bendahara></x-sidebar-bendahara>
<x-alert></x-alert>

    {{ $slot }}


<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src={{ asset('assets/js/script-action.js') }}></script>
<script src="{{ asset('assets/js/script-button.js') }}"></script>
<script src="{{ asset('assets/js/script-popup.js') }}"></script>
<script src="{{ asset('assets/js/script-alert.js') }}"></script>

</body>
</html>
