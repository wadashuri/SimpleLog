<div class="position-sticky">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link link-dark {{ Functions::activeClass('user.home') }}" href="{{ route('user.home') }}">
                <span data-feather="home"></span>
                ホーム
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-dark {{ Functions::activeClass('user.project.index') }}" href="{{ route('user.project.index') }}">
                <span data-feather="activity"></span>
                プロジェクト
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-dark {{ Functions::activeClass('user.task.index') }}" href="{{ route('user.task.index') }}">
                <span data-feather="file-text"></span>
                タスク
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text {{ Functions::activeClass('user.logout') }}" href="{{ route('user.logout') }}"
                onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                <span class="text" data-feather="log-out"></span>
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>
