<!doctype html>

<html>

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('pageTitle')</title>

    @yield('additionalIncludes')

    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/bootstrap-theme.min.css') }}
    {{ HTML::style('css/clinicinthesky.css') }}



</head>

<body>

@include('layouts.navbar')

<div class="container">

    @yield('body')

</div>

{{ HTML::script('js/jquery-2.1.1.min.js') }}
{{ HTML::script('js/bootstrap.min.js') }}
</body>

</html>