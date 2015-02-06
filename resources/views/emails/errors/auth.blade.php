@extends('emails.layouts.1col')

@section('1col')
<h1 style="font-family: Palatino,'Hoefler Text',Georgia,serif; font-size: 20pt; color: #704D25; font-variant: small-caps; font-weight: normal;">{{ trans('app.errors.auth') }}</h1>
<p style="font-family: Palatino,'Hoefler Text',Georgia,serif; margin: 10px; font-size: 12pt; text-transform: uppercase;">{{ trans('app.errors.auth_lead') }}</p>
<pre style="padding: 10px; border: 1px solid #aaa; background: #ededed; font-family: 'Lucida Console',Monaco,'Courier New',monospace; text-align: left; font-size: 9pt; line-height: 1.1em;">{{ $content }}</pre>
@stop
