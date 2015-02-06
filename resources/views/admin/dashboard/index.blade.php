<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <title>{{ trans('app.title') }}</title>
</head>
<body>
    <h1>Admin / Dashboard / Index</h1>
    <pre><?php print_r(Session::get('user')); ?></pre>
    <p><a href="{{ route('auth_signout') }}">Signout</a></p>
</body>
</html>
