<ul class="navbar-nav ml-auto">
    <li class="nav-item {{ Functions::activeClass('front.pages.about') }}">
        <a href="{{ route('front.pages.about') }}" class="nav-link">事務所概要</a>
    </li>
    <li class="nav-item {{ Functions::activeClass('front.pages.services') }}">
        <a href="{{ route('front.pages.services') }}" class="nav-link">サービス</a>
    </li>
    <li class="nav-item {{ Functions::activeClass('front.pages.work') }}">
        <a class="nav-link" href="{{ route('front.pages.work') }}">事業内容</a>
    </li>
    {{-- <li class="nav-item {{ Functions::activeClass('front.pages.team') }}">
        <a href="{{ route('front.pages.team') }}" class="nav-link">チーム</a>
    </li> --}}
    <li class="nav-item {{ Functions::activeClass('front.pages.pricing') }}">
        <a href="{{ route('front.pages.pricing') }}" class="nav-link">価格</a>
    </li>
    <li class="nav-item">
        <a href="https://sinceritylab.com/news/" class="nav-link" target="_blank" rel="noopener noreferrer">お知らせ</a>
    </li>
    <li class="nav-item {{ Functions::activeClass('front.pages.privacy_policy') }}">
        <a href="{{ route('front.pages.privacy_policy') }}" class="nav-link">プライバシーポリシー</a>
    </li>
    <li class="nav-item {{ Functions::activeClass('front.contact.index') }}">
        <a href="{{ route('front.contact.index') }}" class="nav-link">お問い合わせ</a>
    </li>
    <li class="nav-item {{ Functions::activeClass('admin.register') }}">
        <a href="{{ route('admin.register') }}" class="nav-link">新規会員登録</a>
    </li>
    <li class="nav-item {{ Functions::activeClass('admin.login') }}">
        <a href="{{ route('admin.login') }}" class="nav-link">ログイン</a>
    </li>
    {{-- <li class="nav-item {{ Functions::activeClass('front.pages.contact') }} cta">
        <a href="{{ route('front.pages.contact') }}" class="nav-link" data-toggle="modal"
            data-target="#modalRequest"><span>資料請求</span></a>
    </li> --}}
</ul>
