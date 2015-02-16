@extends('layouts.admin')

@section('main')
<main class="ui page grid">
    <div class="two column computer row">
        <div class="center aligned column">
            <h1 class="ui header">Admin / User / Edit</h1>
            <pre><?php print_r($user); ?></pre>
        </div>
    </div>
</main>
@stop
