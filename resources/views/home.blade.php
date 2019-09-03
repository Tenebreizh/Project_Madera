<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://kit.fontawesome.com/14f88d1257.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href=" {{ asset('css/site.css') }} ">
    {{-- <link rel="icon" type="image/png" href=" {{ asset('/img/favicon.png') }} "> --}}

    <title> {{ config('app.name') }} </title>
</head>

<body>
    <div id="app">
        <site-header></site-header>

        <sidebar></sidebar>

        <transition name="slide-fade" mode="out-in">
            <router-view></router-view>
        </transition>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/shards-dashboards.1.1.0') }}"></script>
    <script src="{{ asset('js/extras.1.1.0.min') }}"></script>
</body>
</html>