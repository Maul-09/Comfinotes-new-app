<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/color/color-palete.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/user/style-beranda-user.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/user/style-sidebar-user.css') }}">
    <link rel="icon" href="{{ asset('assets/image/logo-1.png') }}">
    <title>User Dashboard - Comfinotes</title>
</head>
<body>
<x-sidebar-user></x-sidebar-user>

    {{ $slot }}

<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="assets/js/script-button.js"></script>
<script src="assets/js/script-popup.js"></script>
</body>
</html>
