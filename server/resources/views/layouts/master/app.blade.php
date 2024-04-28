<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <!-- Google tag (gtag.js) -->
    @include('layouts.include.ga4')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- bootstrapのJavaScriptファイル -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div id="app">
        @include('layouts.master.header')
        <main class="py-4">
            <div class="container-fluid">
                <div class="row">
                        @include('layouts.master.sidebar')
                    <main class="ms-sm-auto px-md-4">
                        @yield('content')
                    </main>
                </div>
            </div>
        </main>
    </div>
    <!-- Feather Icons -->
    <script>
        feather.replace()
    </script>
</body>

</html>
