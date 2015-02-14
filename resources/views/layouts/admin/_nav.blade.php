 <nav class="ui menu navbar">
    <a href="{{ route('home') }}" target="_blank" class="brand item">{{ trans('app.title') }}</a>
    <a href="{{ route('admin') }}" class="active item">{{ trans('admin.nav.dashboard') }}</a>
    @if ($loggedUser['role'] === 'admin')
        <div class="ui dropdown item">
            {{ trans('admin.nav.users') }}
            <i class="dropdown icon"></i>
            <div class="menu">
                @foreach ($users as $user)
                    <a href="{{ route('admin.user.edit', [$user['id']]) }}" class="item">{{ $user['email'] }}</a>
                @endforeach
            </div>
        </div>
    @endif
    <div class="right menu">
        <a href="{{ route('admin.user.edit', [$loggedUser['id']]) }}" class="item">
            <img src="{{ $loggedUser['avatar'] }}" class="ui avatar image" alt="" style="display: inline; width: 18px; height: 18px;">
            {{ $loggedUser['name'] }}
        </a>
        <a href="{{ route('auth_signout') }}" class="item">
            <i class="lock icon"></i>
            {{ trans('admin.nav.signout') }}
        </a>
    </div>
</nav>
