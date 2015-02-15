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
                <div class="divider"></div>
                <div class="item">
                    <a href="{{ route('admin.user.create') }}" class="ui primary button">{{ trans('admin.nav.user.create') }}</a>
                </div>
            </div>
        </div>
    @endif
    <div class="right menu">
        <div class="ui dropdown item" style="min-width: 150px;">
            {{ $loggedUser['name'] }}
            <div class="menu">
                <div class="ui card" style="width: 150px;">
                    <div class="image dimmable">
                        <div class="ui dimmer">
                            <div class="content">
                                <div class="center">
                                    <a href="{{ route('admin.user.edit', [$loggedUser['id']]) }}" class="ui inverted button">{{ trans('admin.nav.profile') }}</a>
                                </div>
                            </div>
                        </div>
                        <img src="{{ $loggedUser['avatar'] }}" alt="{{ $loggedUser['email'] }}">
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('auth_signout') }}" class="item">
            <i class="lock icon"></i>
            {{ trans('admin.nav.signout') }}
        </a>
    </div>
</nav>
