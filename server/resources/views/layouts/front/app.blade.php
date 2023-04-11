<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Ultim8 - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    
    @include('layouts.front.parts.css')
    
  </head>
  <body>
    @include('layouts.front.header')
    
    @yield('content')

    @include('layouts.front.footer')

    @include('layouts.front.parts.loader')

    @include('layouts.front.parts.modal')

    @include('layouts.front.parts.js')
  </body>
</html>