@php
    $r = \Route::current()->getAction();
    $route = (isset($r['as'])) ? $r['as'] : '';
@endphp

<li class="nav-item mT-30">
    <a class="sidebar-link {{ starts_with($route, ADMIN . '.dash') ? 'active' : '' }}" href="{{ route(ADMIN . '.dash') }}">
        <span class="icon-holder">
            <i class="c-blue-500 ti-home"></i>
        </span>
        <span class="title">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="sidebar-link {{ starts_with($route, ADMIN . '.users') ? 'active' : '' }}" href="{{ route(ADMIN . '.users.index') }}">
        <span class="icon-holder">
            <i class="c-brown-500 ti-user"></i>
        </span>
        <span class="title">Users</span>
    </a>
</li>
<li class="nav-item">
    <a class="sidebar-link" href="{{ route(ADMIN . '.bot.index') }}">
        <span class="icon-holder">
            <i class="c-orange-500 ti-layout-list-thumb"></i>
        </span>
        <span class="title">Bot</span>
    </a>
</li>
<li class="nav-item">
    <a class="sidebar-link" href="{{ route(ADMIN . '.shop.index') }}">
        <span class="icon-holder">
            <i class="c-pink-500 ti-marker-alt"></i>
        </span>
        <span class="title">Shop</span>
    </a>
</li>
<li class="nav-item">
    <a class="sidebar-link" href="{{ route(ADMIN . '.badget.index') }}">
        <span class="icon-holder">
            <i class="c-light-blue-500 ti-money"></i>
        </span>
        <span class="title">Badget</span>
    </a>
</li>
<li class="nav-item">
    <a class="sidebar-link" href="{{ route(ADMIN . '.event.index') }}">
        <span class="icon-holder">
            <i class="c-purple-500 ti-calendar"></i>
        </span>
        <span class="title">Event</span>
    </a>
</li>
