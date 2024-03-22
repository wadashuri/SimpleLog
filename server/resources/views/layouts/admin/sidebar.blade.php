<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div>
        {{-- <div>
        Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
      </div> --}}
        <ul class="nav flex-column">
            <li class="nav-item {{ Functions::activeClass('admin.home') }}">
                <a class="nav-link link-dark" href="{{ route('admin.home') }}">
                    <span data-feather="home"></span>
                    ホーム
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link link-dark {{ Functions::activeClass('admin.task.index') }}"
                    href="{{ route('admin.task.index') }}">
                    <span class="svg_initial" data-feather="file-text"></span>
                    タスク
                </a>
            </li>
            <li class="nav-item {{ Functions::activeClass('admin.project.index') }}">
                <a class="nav-link link-dark" href="{{ route('admin.project.index') }}">
                    <span class="svg_initial" data-feather="activity"></span>
                    プロジェクト
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
        {{-- <div class="dropdown mt-3">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
          設定
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
      </div> --}}
    </div>
</div>
