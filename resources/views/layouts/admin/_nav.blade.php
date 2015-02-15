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
        <div class="ui dropdown item" style="min-width: 150px;">
            {{ $loggedUser['name'] }}
            <div class="menu">
                <a href="{{ route('admin.user.edit', [$loggedUser['id']]) }}">
                    <img src="{{ $loggedUser['avatar'] }}" class="ui centered circular image" alt="" style="width: 150px; height: 150px; padding: 20px 20px 10px 20px;"><br>
                </a>
            </div>
        </div>
        <a href="{{ route('auth_signout') }}" class="item">
            <i class="lock icon"></i>
            {{ trans('admin.nav.signout') }}
        </a>
    </div>
</nav>
