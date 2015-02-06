<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <title>{{ trans('app.title') }}</title>
</head>
<body>
    <h1>Auth / Signin</h1>
    <p><a href="{{ $authorizationUrl }}">Signin with Google</a></p>
</body>
</html>
