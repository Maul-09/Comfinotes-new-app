<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/aset/color-palete.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aset/alert.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aset/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin/style-beranda-admin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin/style-detail-user.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin/style-sidebar-admin.css') }}">
    <link rel="icon" href="{{ asset('assets/image/logo-1.png') }}">
    <title>{{ $title }}</title>
</head>
<body>
<x-sidebar-admin :PageTitle="$PageTitle" :PageSubtitle="$PageSubtitle"/>
<x-alert />
<x-modal-content />

    {{ $slot }}

<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src={{ asset('assets/js/script-action.js') }}></script>
<script src="{{ asset('assets/js/script-button.js') }}"></script>
<script src="{{ asset('assets/js/script-popup.js') }}"></script>
<script src="{{ asset('assets/js/script-alert.js') }}"></script>

</body>
</html>
