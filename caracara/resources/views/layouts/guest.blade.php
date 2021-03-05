<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $attributes->get('title') }} - {{ config('app.name', 'Caracara') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset(mix('css/appGuest.css'))}}">

    <!-- Scripts -->
    <script src="{{ asset(mix('js/app.js')) }}" defer></script>
</head>

<body class="{{ $attributes->get('title') }} lightTheme">
    {{ $slot }}
</body>

</html>
