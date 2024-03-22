<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">SimpleLog</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div>
        {{-- <div>
            Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists,
            etc.
        </div> --}}
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link link-dark {{ Functions::activeClass('user.home') }}" href="{{ route('user.home') }}">
                    <span data-feather="home"></span>
                    ホーム
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link link-dark {{ Functions::activeClass('user.task.index') }}"
                    href="{{ route('user.task.index') }}">
                    <span data-feather="file-text"></span>
                    タスク
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link link-dark {{ Functions::activeClass('user.project.index') }}"
                    href="{{ route('user.project.index') }}">
                    <span data-feather="activity"></span>
                    プロジェクト
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
        <div class="dropdown mt-3">
            {{-- <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
          設定
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul> --}}
        </div>
    </div>
</div>
