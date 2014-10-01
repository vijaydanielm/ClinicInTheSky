<!doctype html>

<html>

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('pageTitle')</title>

    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/bootstrap-theme.min.css') }}
    {{ HTML::style('css/clinicinthesky.css') }}
    {{ HTML::style('css/bootstrap-datetimepicker.min.css') }}

    {{ HTML::script('js/jquery-2.1.1.min.js') }}

</head>

<body>

@include('layouts.navbar')

<div class="container">

    @yield('body')

</div>

{{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('js/moment.min.js') }}
{{ HTML::script('js/bootstrap-datetimepicker.js') }}

</body>

</html>