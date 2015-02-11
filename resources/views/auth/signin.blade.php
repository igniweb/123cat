<!doctype html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <title>{{ trans('app.auth.title') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/app.css') }}">
</head>
<body>
    <main class="ui page grid" style="padding-top: 10em;">
        <div class="row">
            <div class="center aligned starter column">
                <h1 class="ui header" style="margin: 5em auto 2em;">
                    <a href="{{ route('home') }}">
                        <img src="/medias/logo-270x147.jpg" alt="{{ trans('app.title') }}">
                    </a>
                </h1>
                <p>
                    <a href="{{ $authorizationUrl }}" class="ui labeled icon red button">
                        <i class="google icon"></i>
                        {{ trans('app.auth.google') }}
                    </a>
                </p>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="{{ elixir('js/app.js') }}"></script>
</body>
</html>
