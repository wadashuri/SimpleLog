<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('front.pages.index') }}">SimpleLog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ Functions::activeClass('front.pages.index') }}">
                    <a href="{{ route('front.pages.index') }}" class="nav-link">ホーム</a>
                </li>
                <li class="nav-item {{ Functions::activeClass('front.pages.about') }}">
                    <a href="{{ route('front.pages.about') }}" class="nav-link">事務所概要</a>
                </li>
                <li class="nav-item {{ Functions::activeClass('front.pages.services') }}">
                    <a href="{{ route('front.pages.services') }}" class="nav-link">サービス</a>
                </li>
                {{-- <li class="nav-item {{ Functions::activeClass('front.pages.work') }}">
                    <a class="nav-link" href="{{ route('front.pages.work') }}">実績</a>
                </li>
                <li class="nav-item {{ Functions::activeClass('front.pages.team') }}">
                    <a href="{{ route('front.pages.team') }}" class="nav-link">チーム</a>
                </li> --}}
                <li class="nav-item {{ Functions::activeClass('front.pages.pricing') }}">
                    <a href="{{ route('front.pages.pricing') }}" class="nav-link">価格</a>
                </li>
                {{-- <li class="nav-item {{ Functions::activeClass('front.pages.blog') }}">
                    <a href="{{ route('front.pages.blog') }}" class="nav-link">ブログ</a>
                </li>
                <li class="nav-item {{ Functions::activeClass('front.pages.contact') }}">
                    <a href="{{ route('front.pages.contact') }}" class="nav-link">お問い合わせ</a>
                </li> --}}
                <li class="nav-item {{ Functions::activeClass('admin.login') }}">
                    <a href="{{ route('admin.login') }}" class="nav-link">ログイン</a>
                </li>
                {{-- <li class="nav-item {{ Functions::activeClass('front.pages.contact') }} cta">
                    <a href="{{ route('front.pages.contact') }}" class="nav-link" data-toggle="modal"
                        data-target="#modalRequest"><span>資料請求</span></a>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>
