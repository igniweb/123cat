@extends('layouts.admin')

@section('main')
<main class="ui page grid">
    <div class="row">
        <div class="center aligned starter column">
            <h1 class="ui header">Admin / Dashboard / Index</h1>
            <pre class=""><?php print_r(Session::get('user')); ?></pre>
        </div>
    </div>
</main>
@stop
