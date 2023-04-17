@extends('layouts.front.app')

@section('content')
  @include('front.include.content_header',[
    'title1' => 'Services',
    'main_title' => 'サービス',
  ])

  @include('front.include.services')

{{-- newsletter --}}
{{-- @include('front.include.newsletter') --}}
@endsection