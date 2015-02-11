@extends('emails.layouts.1col')

@section('1col')
<h1 style="font-family: Helvetica,Verdana,Arial,sans-serif; font-size: 20pt; color: #704D25; text-transform: uppercase;">{{ trans('app.errors.auth') }}</h1>
<h2 style="font-family: Helvetica,Verdana,Arial,sans-serif; margin: 10px; font-size: 12pt; text-transform: uppercase;">{{ trans('app.errors.auth_lead') }}</h2>
<pre style="padding: 10px 10px 10px 30px; border-left: 3px solid #A37B50; background: #f6f6f6; font-family: 'Lucida Console',Monaco,'Courier New',monospace; text-align: left; font-size: 9pt; line-height: 1.2em;">{{ $content }}</pre>
@stop
