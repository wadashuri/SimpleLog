@extends('layouts.front.app')

@section('content')
    @include('front.include.content_header',[
    'title1' => 'About',
    'main_title' => '事務所概要',
  ])

  {{-- counter --}}
  {{-- @include('front.include.counter') --}}

  @include('front.include.about')
{{-- testimony --}}
{{-- @include('front.include.testimony') --}}

{{-- newsletter --}}
{{-- @include('front.include.newsletter') --}}
  @endsection