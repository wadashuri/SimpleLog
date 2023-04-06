<header class="masthead mb-auto">
    <div class="inner">
        <h3 class="masthead-brand">{{ config('app.name', 'Laravel') }}</h3>
        <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link {{ request()->routeIs('home') ? ' active' : '' }}" href="{{ route('home') }}">Home</a>
            <a class="nav-link {{ request()->routeIs('pricing') ? ' active' : '' }}" href="{{ route('pricing') }}">Pricing</a>
            <a class="nav-link" href="#">Features</a>
            <a class="nav-link" href="#">Contact</a>
            <a class="nav-link {{ request()->routeIs('user.login_form') ? ' active' : '' }}"  href="{{ route('user.login_form') }}">Login</a>
        </nav>
    </div>
</header>