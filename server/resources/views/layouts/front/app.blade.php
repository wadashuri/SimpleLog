<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SimpleLog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- css --}}
    @include('layouts.front.parts.css')

  </head>
  <body>

    {{-- header --}}
    @include('layouts.front.header')

    {{-- content --}}
    @yield('content')

    {{-- footer --}}
    @include('layouts.front.footer')

    {{-- loader --}}
    @include('layouts.front.parts.loader')

    {{-- modal --}}
    @include('layouts.front.parts.modal')

    {{-- js --}}
    @include('layouts.front.parts.js')
  </body>
</html>