<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <title>{{ trans('app.title') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/app.css') }}">
</head>
<body>
    <h1>Auth / Signin</h1>
    <p><a href="{{ $authorizationUrl }}">Signin with Google</a></p>
    <script type="text/javascript" src="{{ elixir('js/app.js') }}"></script>
</body>
</html>
