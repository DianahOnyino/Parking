<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" ng-app="app">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Parking') }}</title>

    {{--JQuery--}}
    <script src="/js/jquery.min.js"></script>

    {{--Zurb Foundation--}}
    <link rel="stylesheet" href="/css/foundation.min.css">

    {{--Bootstrap--}}
    <script src="/bootstrap/bootstrap.min.css"></script>

    {{--Font Awseome--}}
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

    {{--Angular--}}
    <script src="/angular/angular.min.js"></script>

    {{--Angular resource--}}
    <script src="/js/angular-resource.min.js"></script>

    {{--Angular Route--}}
    <script src="/js/angular-route.js"></script>

    {{--Smart Table--}}
    <script src="/js/smart-table.min.js"></script>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">

<div id="app">
    @include("flash_message")

    @include('layouts.header')

    <div class="app-body">
        @include('layouts.sidebar')

        <main class="main">
            <div class="container-fluid">
                <div class="animated fadeIn">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</div>
<script src="/foundation/foundation.min.js"></script>

{{--What Input--}}
<script src="/js/what-input.min.js"></script>

{{--Bootstrap--}}
<script src="/bootstrap/bootstrap.min.js"></script>

<script>
    $(document).foundation();
</script>
</body>
</html>