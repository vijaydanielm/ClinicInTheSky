<!doctype html>

<html>

<head>
    <meta charset="UTF-8"/>
    <title>Welcome to Clinic In The Sky</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/bootstrap-theme.min.css') }}

</head>

<body>
@yield('body')

{{ HTML::script('js/jquery-2.1.1.min.js') }}
{{ HTML::script('js/bootstrap.min.js') }}
</body>

</html>