 <nav class="ui fixed menu inverted navbar">
    <a href="{{ route('home') }}" target="_blank" class="brand item">{{ trans('app.title') }}</a>
    <a href="{{ route('admin') }}" class="active item">{{ trans('admin.nav.dashboard') }}</a>
    <a class="ui dropdown item">{{ trans('admin.nav.users') }}
        <i class="dropdown icon"></i>
        <div class="menu">
            <a href="{{ route('admin') }}" class="item">Admin</a>
        </div>
    </a>
    <a href="{{ route('auth_signout') }}" class="item right">
        <i class="lock icon"></i>
        {{ trans('admin.nav.signout') }}
    </a>
</nav>
