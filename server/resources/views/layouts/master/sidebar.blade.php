<div class="position-sticky">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link link-dark {{ Functions::activeClass('master.home') }}" href="{{ route('master.home') }}">
                <span data-feather="home"></span>
                ホーム
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-dark {{ Functions::activeClass('master.admin.index') }}" href="{{ route('master.admin.index') }}">
                <span class="svg_initial" data-feather="clipboard"></span>
                管理者
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text {{ Functions::activeClass('master.logout') }}" href="{{ route('master.logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <span class="text" data-feather="log-out"></span>
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('master.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>
