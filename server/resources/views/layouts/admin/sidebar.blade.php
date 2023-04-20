<div class="position-sticky">
    <ul class="nav flex-column">
        <li class="nav-item {{ Functions::activeClass('admin.home') }}">
            <a class="nav-link link-dark" href="{{ route('admin.home') }}">
                <span data-feather="home"></span>
                ホーム
            </a>
        </li>
        <li class="nav-item {{ Functions::activeClass('admin.project.index') }}">
            <a class="nav-link link-dark" href="{{ route('admin.project.index') }}">
                <span class="svg_initial" data-feather="activity"></span>
                プロジェクト
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-dark {{ Functions::activeClass('admin.task.index') }}"
                href="{{ route('admin.task.index') }}">
                <span class="svg_initial" data-feather="file-text"></span>
                タスク
            </a>
        </li>
            <li class="nav-item">
                <a class="nav-link link-dark {{ Functions::activeClass('admin.user.index') }}"
                    href="{{ route('admin.user.index') }}">
                    <span class="svg_initial" data-feather="user"></span>
                    ユーザー
                </a>
            </li>
        <li class="nav-item">
            <a class="nav-link link-dark {{ Functions::activeClass('admin.group.create') }}"
                href="{{ route('admin.group.create') }}">
                <span class="svg_initial" data-feather="users"></span>
                グループ
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-dark {{ Functions::activeClass('admin.customer.create') }}"
                href="{{ route('admin.customer.create') }}">
                <span class="svg_initial" data-feather="clipboard"></span>
                顧客
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-dark {{ Functions::activeClass('admin.subscription') }}"
                href="{{ route('admin.subscription') }}">
                <span class="svg_initial" data-feather="dollar-sign"></span>
                お支払い
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-dark {{ Functions::activeClass('admin.logout') }}"
                href="{{ route('admin.logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span data-feather="log-out"></span>
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>
