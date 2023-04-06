<div class="position-sticky">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link link-dark" href="{{ route('admin.home') }}">
                <span data-feather="home"></span>
                ホーム
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-dark" href="{{ route('admin.task.index') }}">
                <span class="svg_initial" data-feather="user"></span>
                タスク
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-dark" href="{{ route('admin.user.index') }}">
                <span class="svg_initial" data-feather="user"></span>
                ユーザー
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-dark" href="{{ route('admin.group.create') }}">
                <span class="svg_initial" data-feather="users"></span>
                グループ
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-dark" href="{{ route('admin.customer.create') }}">
                <span class="svg_initial" data-feather="users"></span>
                顧客
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-dark" href="{{ route('admin.project.index') }}">
                <span class="svg_initial" data-feather="users"></span>
                プロジェクト
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-dark" href="{{ route('admin.logout') }}"
                onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                <span data-feather="log-out"></span>
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>
