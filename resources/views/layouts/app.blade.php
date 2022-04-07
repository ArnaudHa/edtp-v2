<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EDTP</title>

    @livewireStyles

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('css/' . $theme . '/app.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
    <main class="">
        {{ $slot }}
    </main>
</div>

@livewireScripts

<script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>
