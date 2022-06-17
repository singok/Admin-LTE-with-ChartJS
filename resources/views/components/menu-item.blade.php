<li class="nav-item menu-open">
    <a href="{{ route($url) }}" class="nav-link {{ Request::routeIs($url) ? 'active' : '' }}">
        <i class="fa-solid fa-{{ $iconName }}"></i>&nbsp;
        <p>
            {{ $info }}
        </p>
    </a>
</li>