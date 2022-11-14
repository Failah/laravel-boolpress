<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/front.js') }}" defer></script>
    <title>{{ config('app.name', 'Back-up Title Name') }}</title>

    {{-- Token CSRF da aggiungere sempre, si può anche mettere per ordine insieme agli altri tag meta sopra --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <div id="app"></div>
</body>

</html>
