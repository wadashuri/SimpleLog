<ul class="navbar-nav ml-auto">
    <li class="nav-item {{ Functions::activeClass('front.pages.about') }}">
        <a href="{{ route('front.pages.about') }}" class="nav-link">事務所概要</a>
    </li>
    <li class="nav-item {{ Functions::activeClass('front.pages.tokushoho') }}">
        <a class="nav-link" href="{{ route('front.pages.tokushoho') }}">特定商取引法に基づく表記</a>
    </li>
    <li class="nav-item {{ Functions::activeClass('front.pages.privacy_policy') }}">
        <a href="{{ route('front.pages.privacy_policy') }}" class="nav-link">プライバシーポリシー</a>
    </li>
    <li class="nav-item {{ Functions::activeClass('front.pages.work') }}">
        <a class="nav-link" href="{{ route('front.pages.work') }}">事業内容</a>
    </li>
    <li class="nav-item {{ Functions::activeClass('front.pages.team') }}">
        <a href="{{ route('front.pages.team') }}" class="nav-link">チーム</a>
    </li>
    <li class="nav-item">
        <a href="https://blog.sinceritylab.com/blog" class="nav-link" target="_blank" rel="noopener noreferrer">ブログ</a>
    </li>
    <!-- ドロップダウントグル -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            メニュー
        </a>
        <!-- ドロップダウンメニュー本体 -->
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('front.pages.services') }}">サービス</a>
            <a class="dropdown-item" href="{{ route('front.pages.pricing') }}">価格</a>
            <a class="dropdown-item" href="{{ route('front.contact.index') }}">お問い合わせ</a>
            <a class="dropdown-item {{ Functions::activeClass('admin.register') }}"
                href="{{ route('admin.register') }}">新規会員登録</a>
            <a class="dropdown-item {{ Functions::activeClass('admin.login') }}"
                href="{{ route('admin.login') }}">ログイン</a>
        </div>
    </li>
    {{-- <li class="nav-item {{ Functions::activeClass('front.pages.contact') }} cta">
        <a href="{{ route('front.pages.contact') }}" class="nav-link" data-toggle="modal"
            data-target="#modalRequest"><span>資料請求</span></a>
    </li> --}}
</ul>
