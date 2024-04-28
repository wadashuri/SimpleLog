<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">SimpleLog</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
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
        @can('master_admin')
        <li class="nav-item">
            <a class="nav-link link-dark {{ Functions::activeClass('master.post.index') }}" href="{{ route('master.post.index') }}">
                <span class="svg_initial" data-feather="alert-circle"></span>
                お知らせ
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-dark {{ Functions::activeClass('master.category.create') }}" href="{{ route('master.category.create') }}">
                <span class="svg_initial" data-feather="tag"></span>
                カテゴリー
            </a>
        </li>
        @endcan
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
