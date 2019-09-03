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

<body class="h-100">
    <div class="container-fluid" id="app">
        <div class="row">
            <sidebar></sidebar>

            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                <navbar></navbar>
                <div class="main-content-container container-fluid px-4 mt-4">
                    <transition name="slide-fade" mode="out-in">
                        <router-view></router-view>
                    </transition>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="{{ asset('js/shards-dashboards.1.1.0.js') }}"></script>
    {{-- <script src="{{ asset('js/extras.1.1.0.min.js') }}"></script> --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>