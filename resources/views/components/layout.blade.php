<!DOCTYPE html>
@props(['title' => 'Job Industries'])
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="font-antialiased">
<div class="flex flex-col min-h-screen">
    <main class="flex-1">
        {{ $slot }}
    </main>
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
