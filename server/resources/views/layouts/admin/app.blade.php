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
    <!-- fullcalendar -->
    <script src="{{ asset('fullcalendar/core/main.js') }}"></script>
    <script src="{{ asset('fullcalendar/interaction/main.js') }}"></script>
    <script src="{{ asset('fullcalendar/daygrid/main.js') }}"></script>
    <script src="{{ asset('fullcalendar/timegrid/main.js') }}"></script>
    <script src="{{ asset('fullcalendar/list/main.js') }}"></script>
    <script src="{{ asset('fullcalendar/core/locales-all.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- fullcalendar -->
    <link href="{{ asset('fullcalendar/core/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('fullcalendar/daygrid/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('fullcalendar/timegrid/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('fullcalendar/list/main.css') }}" rel="stylesheet" />

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- bootstrapのJavaScriptファイル -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div id="app">
        @include('layouts.admin.header')
        <main class="py-4">
            <div class="container-fluid">
                <div class="row">
                    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                        @include('layouts.admin.sidebar')
                    </nav>
                    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
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
