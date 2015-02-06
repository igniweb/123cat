@extends('emails.layout')

@section('main')
    <h1>{{ trans('app.errors.auth') }}</h1>
    <p class="lead">{{ trans('app.errors.auth_lead') }}</p>
    <pre>{{ $content }}</pre>
@stop
